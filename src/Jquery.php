<?php

declare(strict_types=1);

namespace Vigihdev\WpAssets;

use Vigihdev\WpAssets\Contracts\Able\PublishAbleInterface;
use Vigihdev\WpAssets\Contracts\JqueryInterface;
use Vigihdev\WpAssets\DTOs\JqueryDto;

final class Jquery implements PublishAbleInterface
{

    /**
     * @param JqueryDto $jquery
     */
    public function __construct(
        private readonly JqueryInterface $jquery,
    ) {}

    public function publish(): void
    {
        $jquery = $this->jquery;
        add_action('wp_enqueue_scripts', function () use ($jquery) {
            wp_enqueue_script(
                handle: $jquery->getHandle(),
                src: $jquery->getSrcUri(),
                deps: [],
                ver: $jquery->getVersion(),
                args: $jquery->getJsOption()?->toArray()
            );
        });
    }
}
