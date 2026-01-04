<?php

declare(strict_types=1);

namespace Vigihdev\WpAssets\Service;

use Vigihdev\WpAssets\Contracts\Manager\JqueryManagerInterface;
use Vigihdev\WpAssets\Contracts\ScriptEnqueueInterface;
use Vigihdev\WpAssets\DTOs\ScriptEnqueueDto;

final class JqueryManager implements JqueryManagerInterface
{

    /**
     * @param ScriptEnqueueDto $jquery
     */
    public function __construct(
        private readonly ScriptEnqueueInterface $jquery,
    ) {}

    public function publish(): void
    {
        $jquery = $this->jquery;
        add_action('wp_enqueue_scripts', function () use ($jquery) {
            wp_enqueue_script(
                $jquery->getHandle(),
                $jquery->getSrcUri(),
                $jquery->getDepends(),
                $jquery->getVersion(),
                $jquery->getJsOption()->toArray()
            );
        });
    }
}
