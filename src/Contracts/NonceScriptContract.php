<?php

declare(strict_types=1);

namespace WpAssets\Contracts;

interface NonceScriptContract extends RegisterContract
{

    public function getHandle(): string;

    public function getVariableName(): string;

    public function getNonce(): string;

    public function getActions(): array;

    public function getAjaxurl(): string;
}
