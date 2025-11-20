<?php

declare(strict_types=1);

namespace Vigihdev\WpAssets\DTOs;

use InvalidArgumentException;
use Vigihdev\WpAssets\Contracts\ModuleJsInterface;

final class ModuleJsDto implements ModuleJsInterface
{

    public function __construct(
        private readonly string $basepath,
        private readonly string $baseUrl,
        private readonly string $version,
        private readonly array $js = [],
    ) {
        if (!is_dir($basepath)) {
            throw new InvalidArgumentException("Error Directory {$basepath} tidak di temukan");
        }
    }

    public function getBasepath(): string
    {
        return $this->basepath;
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
