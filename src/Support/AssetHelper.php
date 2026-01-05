<?php

declare(strict_types=1);

namespace Vigihdev\WpAssets\Support;

final class AssetHelper
{
    public static function isDir(string $path): bool
    {
        return is_dir($path);
    }

    public static function isFile(string $path): bool
    {
        return is_file($path) && is_readable($path);
    }

    public static function isUrl(string $path): bool
    {
        return filter_var($path, FILTER_VALIDATE_URL) !== false;
    }

    public static function cid(...$args): string
    {
        $arg = implode('-', $args);
        return sprintf("%u", crc32($arg));
    }

    public static function getFilename(string $path): string
    {
        return (string)pathinfo($path, PATHINFO_FILENAME);
    }
}
