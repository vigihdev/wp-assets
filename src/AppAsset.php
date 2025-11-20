<?php

declare(strict_types=1);

namespace Vigihdev\WpAssets;

use InvalidArgumentException;
use Symfony\Component\Filesystem\Path;
use Vigihdev\WpAssets\Contracts\JsOptionsInterface;
use Vigihdev\WpAssets\Contracts\PublishScriptInterface;
use Vigihdev\WpAssets\Contracts\PublishStyleInterface;
use Vigihdev\WpAssets\DTOs\ScriptEnqueueDto;
use Vigihdev\WpAssets\DTOs\StyleEnqueueDto;

final class AppAsset extends BaseAsset implements PublishScriptInterface, PublishStyleInterface
{

    public function __construct(
        private readonly string $basePath,
        private readonly string $baseUrl,
        private readonly string $version,
        private readonly JsOptionsInterface $jsOption,
        private readonly array $depends = [],
        private readonly array $js = [],
        private readonly array $css = []
    ) {
        if (!is_dir($basePath)) {
            throw new InvalidArgumentException("Error Directory {$basePath} tidak di temukan");
        }
    }

    /**
     *
     * @return ScriptEnqueueDto[]
     */
    public function getPublishScript(): array
    {

        $items = [];
        foreach ($this->js as $i => $js) {
            $file = Path::join($this->basePath, $js);
            if ($file) {
                $items[] = new ScriptEnqueueDto(
                    handle: $this->withHandleFilename($file, 'js'),
                    srcUri: "{$this->baseUrl}/{$js}",
                    version: $this->version,
                    jsOption: $this->jsOption,
                    depends: $this->depends,
                    options: []
                );
            }
        }

        return $items;
    }

    /**
     *
     * @return StyleEnqueueDto[]
     */
    public function getPublishStyle(): array
    {
        $items = [];
        foreach ($this->css as $i => $css) {
            $file = Path::join($this->basePath, $css);
            if ($file) {
                $items[] = new StyleEnqueueDto(
                    handle: $this->withHandleFilename($file, 'css'),
                    srcUri: "{$this->baseUrl}/{$css}",
                    version: $this->version,
                    depends: [],
                );
            }
        }
        return $items;
    }
}
