<?php

declare(strict_types=1);

namespace Vigihdev\WpAssets\Contracts;

interface JsModuleInterface
{
    public function getBasepath(): string;

    public function getBaseUrl(): string;

    public function getVersion(): string;

    public function getJs(): array;

    public function getJsOptions(): JsOptionsInterface;

    public function getDepends(): array;
}
