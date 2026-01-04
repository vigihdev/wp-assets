<?php

declare(strict_types=1);

namespace Vigihdev\WpAssets\Service;

use Vigihdev\WpAssets\Contracts\Manager\CssManagerInterface;
use Vigihdev\WpAssets\Contracts\StyleEnqueueInterface;
use Vigihdev\WpAssets\DTOs\StyleEnqueueDto;

final class CssManager implements CssManagerInterface
{

    /**
     * @var StyleEnqueueDto[] $cssAssets
     */
    private array $cssAssets = [];

    public function __construct(
        iterable $assets,
    ) {

        foreach ($assets as $asset) {
            if ($asset instanceof StyleEnqueueInterface) {
                $this->cssAssets[] = $asset;
            }
        }
    }

    public function publish(): void
    {
        add_action('wp_enqueue_scripts', function () {
            // Todo : Add css enqueue
        });

        foreach ($this->cssAssets as $asset) {
            // Todo : Add css enqueue
        }
    }
}
