<?php

declare(strict_types=1);

namespace Vigihdev\WpAssets;

use Vigihdev\Support\Text;

abstract class BaseAsset
{

    protected function withHandleFilename(string $file, string $prefix): string
    {
        $name = pathinfo($file, PATHINFO_FILENAME);
        return Text::toKebabCase(preg_replace('/[\.]+/', ' ', $name . "-{$prefix}"));
    }
}
