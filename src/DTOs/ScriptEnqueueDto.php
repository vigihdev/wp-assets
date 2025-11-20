<?php

declare(strict_types=1);

namespace Vigihdev\WpAssets\DTOs;

use Vigihdev\WpAssets\Contracts\{JsOptionsInterface, ScriptEnqueueInterface};
use vigihdev\WpAssets\DTOs\JsOptionsDto;

final class ScriptEnqueueDto implements ScriptEnqueueInterface
{


    /** 
     * @param JsOptionsDto $jsOption 
     */
    public function __construct(
        private readonly string $handle,
        private readonly string $srcUri,
        private readonly JsOptionsInterface $jsOption,
        private readonly string|bool|null $version = false,
        private readonly array $depends = [],
        private readonly array $options = []
    ) {}

    public function getJsOption(): JsOptionsInterface
    {
        return $this->jsOption;
    }

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

    public function getVersion(): string|bool|null
    {
        return $this->version;
    }

    public function getOptions(): array
    {
        return $this->options;
    }
}
