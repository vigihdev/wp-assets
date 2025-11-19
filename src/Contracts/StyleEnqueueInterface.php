<?php

declare(strict_types=1);

namespace Vigihdev\WpAssets\Contracts;

interface StyleEnqueueInterface
{

    public function getHandle(): string;
    public function getSrcUri(): string;
    public function getDepends(): array;
    public function getVersion(): string|bool|null;
    public function getMedia(): string;
}
