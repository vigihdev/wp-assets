<?php

declare(strict_types=1);

namespace Vigihdev\WpAssets;

use InvalidArgumentException;
use Symfony\Component\Filesystem\Path;
use Vigihdev\WpAssets\Contracts\PublishScriptInterface;
use Vigihdev\WpAssets\DTOs\ScriptEnqueueDto;

final class JqueryAsset extends BaseAsset implements PublishScriptInterface
{

    public function __construct(
        private readonly string $basePath,
        private readonly string $baseUrl,
        private readonly string|bool|null $version,
        private readonly array $js = [],
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
                    depends: [],
                    options: []
                );
            }
        }

        return $items;
    }
}
