<?php

declare(strict_types=1);

namespace Vigihdev\WpAssets\Service;

use InvalidArgumentException;
use Vigihdev\WpAssets\Contracts\{PublishStyleInterface, PublishScriptInterface, ScriptLocalizeInterface, WpAssetManagerInterface};

final class WpAssetManagerService implements WpAssetManagerInterface
{

    /**
     * @param array<string,PublishStyleInterface|PublishScriptInterface|ScriptLocalizeInterface> $assets
     * @return void
     */
    public function __construct(
        private readonly array $assets
    ) {}


    /**
     *
     * @param string $name
     * @return PublishStyleInterface|PublishScriptInterface|ScriptLocalizeInterface
     * @throws InvalidArgumentException
     */
    public function getService(string $name): object
    {

        if (! $this->hasService($name)) {
            throw new InvalidArgumentException("Service {$name} tidak tersedia");
        }
        return $this->assets[$name];
    }

    /**
     *
     * @return array<int, string> Daftar nama service.
     */
    public function getAvailableServiceNames(): array
    {
        return array_keys($this->assets);
    }

    /**
     *
     * @param string $name Nama service.
     * @return bool True jika tersedia, false jika tidak.
     */
    public function hasService(string $name): bool
    {
        return isset($this->assets[$name]);
    }
}
