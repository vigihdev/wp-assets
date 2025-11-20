<?php

declare(strict_types=1);

namespace Vigihdev\WpAssets\DTOs;

use Vigihdev\WpAssets\Contracts\JsOptionsInterface;

final class JsOptionsDto implements JsOptionsInterface
{

    public function __construct(
        private readonly ?string $strategy = null,
        private readonly bool $inFooter = true,
    ) {}

    public function getInFooter(): bool
    {
        return $this->inFooter;
    }

    public function getStrategy(): ?string
    {
        return $this->strategy;
    }

    public function toArray(): array
    {
        $data = [];

        if ($this->inFooter) {
            $data = array_merge($data, [
                'in_footer' => true
            ]);
        }

        if ($this->strategy) {
            $data = array_merge($data, [
                'strategy' => $this->strategy
            ]);
        }

        return $data;
    }
}
