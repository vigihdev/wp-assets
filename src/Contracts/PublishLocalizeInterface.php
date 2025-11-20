<?php

declare(strict_types=1);

namespace Vigihdev\WpAssets\Contracts;

interface PublishLocalizeInterface
{


    /**
     *
     * @return ScriptLocalizeInterface
     */
    public function getLocalizeScript(): ScriptLocalizeInterface;
}
