<?php

declare(strict_types=1);

namespace Vigihdev\WpAssets;

use Vigihdev\WpAssets\Contracts\NonceScriptInterface;

final class NonceScriptAsset implements NonceScriptInterface
{

    public function __construct(
        private readonly string $handle = 'nonce-js',
        private readonly string $variableName = 'WP_API',
        private readonly string $actionPrefix = 'wp_ajax_',
        private readonly array $actions = []
    ) {}
}
