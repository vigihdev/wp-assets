<?php

declare(strict_types=1);

namespace WpAssets;

use WpAssets\Contracts\NonceScriptContract;

final class PublishNonceScriptAsset implements NonceScriptContract
{
    public function __construct(
        private readonly string $handle,
        private readonly string $variableName,
        private readonly string $nonce,
        private readonly array $actions,
        private readonly string $ajaxurl = 'admin-ajax.php',
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
        return $this->nonce;
    }

    public function getActions(): array
    {
        return $this->actions;
    }

    public function getAjaxurl(): string
    {
        return $this->ajaxurl;
    }

    public function register(): void
    {

        wp_localize_script($this->handle, $this->variableName, [
            'ajaxurl' => admin_url($this->ajaxurl),
            'nonce' => wp_create_nonce($this->nonce),
            'actions' => $this->actions,
        ]);
    }
}
