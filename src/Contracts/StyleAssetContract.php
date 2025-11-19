<?php

declare(strict_types=1);

namespace Vigihdev\WpAssets\Contracts;

interface StyleAssetContract
{
    public function getHandle(): string;

    public function getSrcUri(): string;

    public function getDepends(): array;

    public function getVersion(): string|bool;

    public function getOptions(): array;
}
