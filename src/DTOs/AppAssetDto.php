<?php

declare(strict_types=1);

namespace Vigihdev\WpAssets\DTOs;

use Vigihdev\WpAssets\Contracts\AppAssetInterface;
use Vigihdev\WpAssets\Contracts\JsOptionsInterface;

final class AppAssetDto implements AppAssetInterface
{

    /**
     *
     * @param string $basepath 
     * @param string $baseUrl
     * @param string $version
     * @param JsOptionsDto $jsOption
     * @param array $depends
     * @param array $js
     * @param array $css
     * @return void
     */
    public function __construct(
        private readonly string $basepath,
        private readonly string $baseUrl,
        private readonly string $version,
        private readonly JsOptionsInterface $jsOption,
        private readonly array $depends = [],
        private readonly array $js = [],
        private readonly array $css = []
    ) {}

    public function getBasepath(): string
    {
        return $this->basepath;
    }

    public function getBaseUrl(): string
    {
        return $this->baseUrl;
    }

    public function getVersion(): string
    {
        return $this->version;
    }

    public function getJsOptions(): JsOptionsInterface
    {
        return $this->jsOption;
    }

    public function getDepends(): array
    {
        return $this->depends;
    }

    public function getJs(): array
    {
        return $this->js;
    }

    public function getCss(): array
    {
        return $this->css;
    }
}
