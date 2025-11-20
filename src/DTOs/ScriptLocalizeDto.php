<?php

declare(strict_types=1);

namespace Vigihdev\WpAssets\DTOs;

use Vigihdev\WpAssets\Contracts\ScriptLocalizeInterface;

final class ScriptLocalizeDto implements ScriptLocalizeInterface
{

    public function __construct(
        private readonly string $handle = 'nonce-js',
        private readonly string $variableName = 'WP_API',
        private readonly string $actionPrefix = 'wp_ajax_',
        private readonly array $depends = [],
        private readonly array $actions = []
    ) {}

    public function getHandle(): string
    {
        return $this->handle;
    }

    public function getDepends(): array
    {
        return $this->depends;
    }

    public function getActionPrefix(): string
    {
        return $this->actionPrefix;
    }

    public function getVariableName(): string
    {
        return $this->variableName;
    }

    public function getActions(): array
    {
        return $this->actions;
    }
}
