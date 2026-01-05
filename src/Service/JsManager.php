<?php

declare(strict_types=1);

namespace Vigihdev\WpAssets\Service;

use Vigihdev\Support\Text;
use Vigihdev\WpAssets\Contracts\Manager\JsManagerInterface;
use Vigihdev\WpAssets\Contracts\ScriptEnqueueInterface;
use Vigihdev\WpAssets\DTOs\ScriptEnqueueDto;
use Vigihdev\WpAssets\Support\AssetHelper;

final class JsManager implements JsManagerInterface
{

    /**
     * @var ScriptEnqueueDto[] $jsAssets 
     */
    private array $jsAssets = [];

    public function __construct(
        iterable $assets,
    ) {

        foreach ($assets as $asset) {
            if ($asset instanceof ScriptEnqueueInterface) {
                $this->jsAssets[] = $asset;
            }
        }
    }

    public function publish(): void
    {

        if (empty($this->jsAssets)) {
            return;
        }

        add_action('wp_enqueue_scripts', function () {
            foreach ($this->jsAssets as $asset) {

                if (!AssetHelper::isUrl($asset->getSrcUri())) {
                    continue;
                }

                $hashJs = AssetHelper::cid($asset->getSrcUri());
                $hadleJs = $asset->getHandle() . '-' . $hashJs;
                wp_enqueue_script(
                    handle: Text::toKebabCase($hadleJs),
                    src: $asset->getSrcUri(),
                    deps: $asset->getDepends(),
                    ver: $asset->getVersion(),
                    args: $asset->getJsOption()->toArray(),
                );
            }
        });
    }
}
