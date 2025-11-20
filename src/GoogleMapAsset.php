<?php

declare(strict_types=1);

namespace Vigihdev\WpAssets;

use InvalidArgumentException;

final class GoogleMapAsset
{

    public function __construct(
        private readonly string $basePath,
        private readonly string $baseUrl,
        private readonly string $version,
        private readonly array $js = [],
    ) {
        if (!is_dir($basePath)) {
            throw new InvalidArgumentException("Error Directory {$basePath} tidak di temukan");
        }
    }
}
