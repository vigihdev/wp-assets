<?php

declare(strict_types=1);

namespace Vigihdev\WpAssets;

use InvalidArgumentException;
use Vigihdev\WpAssets\Contracts\ModuleJsInterface;

final class ModuleJsAsset implements ModuleJsInterface
{

    public function __construct(
        private readonly string $basePath,
        private readonly string $baseUrl,
        private readonly string $version,
        private readonly array $depends = [],
        private readonly array $js = [],
    ) {
        if (!is_dir($basePath)) {
            throw new InvalidArgumentException("Error Directory {$basePath} tidak di temukan");
        }
    }

    public function getBasepath(): string
    {
        return $this->basePath;
    }

    public function getBaseUrl(): string
    {
        return $this->baseUrl;
    }

    public function getJs(): array
    {
        return $this->js;
    }

    public function getVersion(): string
    {
        return $this->version;
    }
}
