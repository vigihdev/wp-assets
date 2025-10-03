<?php

declare(strict_types=1);

namespace WpAssets\Contracts;

interface EnqueueStyleContract extends RegisterContract
{

    public function getHandle(): string;
    public function getSrcUri(): string;
    public function getDepends(): array|string|bool;
    public function getVersion(): string;
    public function getMedia(): string;
}
