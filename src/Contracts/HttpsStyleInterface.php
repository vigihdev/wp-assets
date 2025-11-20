<?php

declare(strict_types=1);

namespace Vigihdev\WpAssets\Contracts;

interface HttpsStyleInterface
{

    public function getHandle(): string;

    public function getSrcUri(): string;

    public function getDepends(): array;

    public function getMedia(): string;

    public function getVersion(): string;
}
