<?php

declare(strict_types=1);

namespace WpAssets;

use JsonSerializable;


final class JsOptionAsset implements JsonSerializable
{

    public function __construct(
        private readonly ?string $strategy = null,
        private readonly bool $in_footer = true,
    ) {}

    public function jsonSerialize(): array
    {

        $data = [];
        if ($this->in_footer) {
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
