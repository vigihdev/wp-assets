<?php

declare(strict_types=1);

namespace Vigihdev\WpAssets\Service;

use Vigihdev\Support\Text;
use Vigihdev\WpAssets\Contracts\AppAssetInterface;
use Vigihdev\WpAssets\Contracts\Manager\AppAssetManagerInterface;
use Vigihdev\WpAssets\DTOs\AppAssetDto;
use Vigihdev\WpAssets\Exceptions\WpAssetsException;

/**
 * Manajer asset aplikasi
 * 
 * Memuat asset CSS dan JS ke dalam queue enqueue.
 * 
 */
final class AppAssetManager implements AppAssetManagerInterface
{

    /**
     * Konstruktor manajer asset aplikasi
     * 
     * @param AppAssetDto $asset Asset aplikasi
     */
    public function __construct(
        private readonly AppAssetInterface $asset
    ) {
        if (!is_dir($this->asset->getBasepath())) {
            throw WpAssetsException::directoryNotFound($this->asset->getBasepath());
        }
    }

    /**
     * Memuat asset CSS dan JS ke dalam queue enqueue.
     * 
     * @return void
     */
    public function publish(): void
    {

        if (!empty($this->asset->getCss())) {
            add_action('wp_enqueue_scripts', function () {
                foreach ($this->asset->getCss() as $css) {
                    $hashCss = sprintf("%u", crc32($css));
                    $hadleCss = preg_replace('/(.*?\/)(.*)(\.css$)/', '${2}-' . $hashCss, $css);
                    wp_enqueue_style(
                        handle: Text::toKebabCase($hadleCss),
                        src: "{$this->asset->getBaseUrl()}/{$css}",
                        deps: [],
                        ver: $this->asset->getVersion(),
                        media: 'all',
                    );
                }
            });
        }

        if (!empty($this->asset->getJs())) {

            add_action('wp_enqueue_scripts', function () {
                foreach ($this->asset->getJs() as $js) {
                    $hadle = preg_replace('/(.*?\/)(.*)(\.js$)/', '$2', $js);
                    wp_enqueue_script(
                        handle: Text::toKebabCase($hadle),
                        src: "{$this->asset->getBaseUrl()}/{$js}",
                        deps: $this->asset->getDepends(),
                        ver: $this->asset->getVersion(),
                        args: $this->asset->getJsOptions()->toArray(),
                    );
                }
            });
        }
    }
}
