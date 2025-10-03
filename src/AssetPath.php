<?php

declare(strict_types=1);

namespace WpAssets;

use Symfony\Component\Filesystem\Path;
use Yiisoft\Strings\Inflector;

final class AssetPath
{

    public function __construct(
        private readonly string $basePath,
        private readonly ?string $baseUrl = null,
        private readonly array $js = [],
        private readonly array $css = []
    ) {
        if (!is_dir($basePath)) {
            throw new \Exception("Error Directory {$basePath} tidak di temukan", 1);
        }
    }

    public function getResolvedHttpsCss(): array
    {
        $httpCss = [];
        foreach ($this->css as $css) {
            if ($this->isUrl($css)) {
                $httpCss[$this->extractHandleFromUrl($css)] = $css;
            }
        }
        return $httpCss;
    }

    public function getResolvedHttpsJs(): array
    {
        $httpJs = [];
        foreach ($this->js as $js) {
            if ($this->isUrl($js)) {
                $httpJs[$this->extractHandleFromUrl($js)] = $js;
            }
        }
        return $httpJs;
    }

    private function extractHandleFromUrl(string $url): string
    {
        $inflector = new Inflector();
        $parse = parse_url($url);
        $host = $parse['host'];
        $path = $parse['path'] ?? '';

        preg_match('/\/[\w\.]+$/', $path, $namePaths);
        $namePath = current($namePaths) ?? '';
        $namePath = ltrim($namePath, '/');
        // $namePath = preg_replace('/\.?(js|css)$/', '', ltrim($namePath, '/'));

        $namePath = $inflector->pascalCaseToId($inflector->toPascalCase($namePath));
        $nameHost = $inflector->pascalCaseToId($inflector->toPascalCase($host));
        return "{$nameHost}-{$namePath}";
    }

    private function isUrl(string $param): bool
    {
        $regex = "/^(https?):\/\/[^\s\/$.?#].[^\s]*$/i";
        return (bool)preg_match($regex, $param);
    }

    public function getResolvedCssFiles(): array
    {
        $fileCss = [];
        foreach ($this->css as $css) {
            $file = Path::join($this->basePath, $css);
            $filename = pathinfo($file, PATHINFO_FILENAME);
            if (is_file($file)) {
                $fileCss[$filename] = $this->baseUrl . "/{$css}";
            }
        }
        return $fileCss;
    }

    public function getResolvedJsFiles(): array
    {
        $fileJs = [];
        foreach ($this->js as $js) {
            $file = Path::join($this->basePath, $js);
            $filename = pathinfo($file, PATHINFO_FILENAME);
            if (is_file($file)) {
                $fileJs[$filename] = $this->baseUrl . "/{$js}";
            }
        }
        return $fileJs;
    }

    public function getBasePath(): string
    {
        return $this->basePath;
    }

    public function getBaseUrl(): ?string
    {
        return $this->baseUrl;
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
