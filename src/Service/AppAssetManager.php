<?php

declare(strict_types=1);

namespace Vigihdev\WpAssets\Service;

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
     * @param AppAssetDto $assets Asset aplikasi
     */
    public function __construct(
        private readonly AppAssetDto $asset
    ) {
        if (!is_dir($this->asset->getBasepath())) {
            WpAssetsException::directoryNotFound($this->asset->getBasepath());
        }
    }

    /**
     * Memuat asset CSS dan JS ke dalam queue enqueue.
     * 
     * @return void
     */
    public function publish(): void
    {
        foreach ($this->asset->getCss() as $css) {
            // TODO: Add css enqueue
        }

        foreach ($this->asset->getJs() as $js) {
            // TODO: Add js enqueue
        }
    }
}
