<?php

declare(strict_types=1);

namespace Vigihdev\WpAssets\Service;

use Vigihdev\WpAssets\Contracts\Manager\JsLocalizerManagerInterface;
use Vigihdev\WpAssets\Contracts\ScriptLocalizeInterface;
use Vigihdev\WpAssets\DTOs\ScriptLocalizeDto;

final class JsLocalizerManager implements JsLocalizerManagerInterface
{

    /**
     *
     * @param ScriptLocalizeDto $localize
     * @return void
     */
    public function __construct(
        private readonly ScriptLocalizeInterface $localize,
    ) {}

    public function publish(): void
    {
        add_action('wp_enqueue_scripts', function () {
            // TODO: Add js enqueue
        });
    }
}
