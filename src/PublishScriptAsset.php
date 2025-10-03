<?php

declare(strict_types=1);

namespace WpAssets;

use WpAssets\Contracts\EnqueueScriptContract;

final class PublishScriptAsset implements EnqueueScriptContract
{
    public function __construct(
        private readonly string $handle,
        private readonly string $srcUri,
        private readonly array $depends,
        private readonly string|bool $version = false,
        private readonly array $options = []
    ) {}

    public function getHandle(): string
    {
        return $this->handle;
    }

    public function getSrcUri(): string
    {
        return $this->srcUri;
    }

    public function getDepends(): array
    {
        return $this->depends;
    }

    public function getVersion(): string|bool
    {
        return $this->version;
    }

    public function getOptions(): array
    {
        return $this->options;
    }

    public function register(): void
    {
        add_action('wp_enqueue_scripts', function () {
            wp_enqueue_script(
                $this->getHandle(),
                $this->getSrcUri(),
                $this->getDepends(),
                $this->getVersion(),
                $this->getOptions()
            );
        });
    }
}
