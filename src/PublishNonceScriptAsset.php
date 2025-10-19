<?php

declare(strict_types=1);

namespace WpAssets;

use WpAssets\Contracts\NonceScriptContract;

final class PublishNonceScriptAsset implements NonceScriptContract
{
    public function __construct(
        private readonly string $handle = 'nonce-js',
        private readonly string $variableName = 'WP_API',
        private readonly string $actionPrefix = 'wp_ajax_',
        private readonly array $actions = []
    ) {}

    public function getHandle(): string
    {
        return $this->handle;
    }

    public function getVariableName(): string
    {
        return $this->variableName;
    }

    public function getNonce(): string
    {
        return wp_create_nonce('wp_ajax_nonce');
    }

    public function getActions(): array
    {
        return $this->actions;
    }

    public function getAjaxurl(): string
    {
        return admin_url('admin-ajax.php');
    }

    public function register(): void
    {
        add_action('wp_enqueue_scripts', function () {
            wp_register_script($this->getHandle(), '', [], false, true);

            wp_localize_script($this->getHandle(), $this->getVariableName(), [
                'ajaxurl' => $this->getAjaxurl(),
                'nonce' => $this->getNonce(),
                'actions' => $this->getActions(),
            ]);

            wp_enqueue_script($this->getHandle());
        });
    }
}
