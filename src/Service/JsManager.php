<?php

declare(strict_types=1);

namespace Vigihdev\WpAssets\Service;

use Vigihdev\WpAssets\Contracts\Manager\JsManagerInterface;
use Vigihdev\WpAssets\Contracts\ScriptEnqueueInterface;
use Vigihdev\WpAssets\DTOs\ScriptEnqueueDto;

final class JsManager implements JsManagerInterface
{

    /**
     * @var ScriptEnqueueDto[] $jsAssets 
     */
    private array $jsAssets = [];

    public function __construct(
        iterable $assets,
    ) {

        foreach ($assets as $asset) {
            if ($asset instanceof ScriptEnqueueInterface) {
                $this->jsAssets[] = $asset;
            }
        }
    }

    public function publish(): void
    {
        add_action('wp_enqueue_scripts', function () {
            // TODO: Add js enqueue
        });

        foreach ($this->jsAssets as $asset) {
            // TODO: Add js enqueue
        }
    }
}
