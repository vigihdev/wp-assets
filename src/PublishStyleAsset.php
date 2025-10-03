<?php

declare(strict_types=1);

namespace WpAssets;

use WpAssets\Contracts\EnqueueStyleContract;


final class PublishStyleAsset implements EnqueueStyleContract
{
    public function __construct(
        private readonly string $handle,
        private readonly string $srcUri,
        private readonly array|string|bool $depends,
        private readonly string $version,
        private readonly string $media
    ) {}

    public function getHandle(): string
    {
        return $this->handle;
    }

    public function getSrcUri(): string
    {
        return $this->srcUri;
    }

    public function getDepends(): array|string|bool
    {
        return $this->depends;
    }

    public function getVersion(): string
    {
        return $this->version;
    }

    public function getMedia(): string
    {
        return $this->media;
    }

    public function register(): void
    {
        add_action('wp_enqueue_scripts', function () {
            wp_enqueue_style(
                $this->getHandle(),
                $this->getSrcUri(),
                $this->getDepends(),
                $this->getVersion(),
                $this->getMedia()
            );
        });
    }
}
