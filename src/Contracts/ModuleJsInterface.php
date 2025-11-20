<?php

declare(strict_types=1);

namespace Vigihdev\WpAssets\Contracts;

interface ModuleJsInterface
{
    public function getBasepath(): string;

    public function getBaseUrl(): string;

    public function getJs(): array;

    public function getVersion(): string;
}
