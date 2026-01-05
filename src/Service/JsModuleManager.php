<?php

declare(strict_types=1);

namespace Vigihdev\WpAssets\Service;

use Vigihdev\WpAssets\Contracts\Manager\JsModuleManagerInterface;
use Vigihdev\WpAssets\Contracts\JsModuleEnqueueInterface;
use Vigihdev\WpAssets\DTOs\JsModuleEnqueueDto;

final class JsModuleManager implements JsModuleManagerInterface
{
    /**
     * @var JsModuleEnqueueDto[] $jsModuleAssets
     */
    private array $jsModuleAssets = [];

    public function __construct() {}

    public function publish(): void
    {
        foreach ($this->jsModuleAssets as $asset) {
            // Todo : Add js module enqueue
        }
    }
}
