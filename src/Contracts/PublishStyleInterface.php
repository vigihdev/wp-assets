<?php

declare(strict_types=1);

namespace Vigihdev\WpAssets\Contracts;

interface PublishStyleInterface
{
    /**
     *
     * @return array<int,StyleEnqueueInterface>
     */
    public function getPublishStyle(): array;
}
