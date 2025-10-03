<?php

declare(strict_types=1);

namespace WpAssets;

use WpAssets\Contracts\EnqueueScriptContract;

final class PublishModuleJsAsset implements EnqueueScriptContract
{

    public function __construct(
        private readonly string $handle,
        private readonly string $srcUri,
        private readonly array $depends,
        private readonly string|bool $version = false,
        private readonly array $options = [
            'in_footer' => true,
        ]
    ) {}

    public function getHandle(): string
    {
        return $this->handle . "-{$this->getPrefix()}";
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

    private function getPrefix(): int
    {
        return crc32(static::class);
    }

    private function onAfterLoader(string $tag, string $handle, string $src)
    {
        if ($handle === $this->getHandle()) {
            $tag = preg_replace('/type=.*?\s/', 'type="module" ', $tag);
        }
        return $tag;
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

        add_filter('script_loader_tag', function ($tag, $handle, $src) {
            return $this->onAfterLoader($tag, $handle, $src);
        }, 10, 3);
    }
}
