<?php

declare(strict_types=1);

namespace Vigihdev\WpAssets\Contracts;

interface PublishScriptInterface
{
    /**
     *
     * @return array<int,ScriptEnqueueInterface>
     */
    public function getPublishScript(): array;
}
