<?php

declare(strict_types=1);

namespace Vigihdev\WpAssets\Contracts;

interface WpAssetManagerInterface
{


    /**
     *
     * @param string $name
     * @return PublishStyleInterface|PublishScriptInterface|ScriptLocalizeInterface
     * @throws InvalidArgumentException
     */
    public function getService(string $name): PublishStyleInterface|PublishScriptInterface|ScriptLocalizeInterface;

    /**
     *
     * @return array<int, string> Daftar nama service.
     */
    public function getAvailableServiceNames(): array;

    /**
     *
     * @param string $name Nama service.
     * @return bool True jika tersedia, false jika tidak.
     */
    public function hasService(string $name): bool;
}
