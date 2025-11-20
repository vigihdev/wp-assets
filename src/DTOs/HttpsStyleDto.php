<?php

declare(strict_types=1);

namespace Vigihdev\WpAssets\DTOs;

use Vigihdev\WpAssets\Contracts\HttpsStyleInterface;

final class HttpsStyleDto implements HttpsStyleInterface
{

    public function __construct(
        private readonly string $handle,
        private readonly string $srcUri,
        private readonly array $depends,
        private readonly string $version = '1.0',
        private readonly string $media = 'all'
    ) {
        if (substr($srcUri, 0, 4) !== 'http') {
            throw new \InvalidArgumentException("The {$srcUri} must be an HTTPS URL.");
        }
    }

    public function getHandle(): string
    {
        return $this->handle;
    }

    public function getSrcUri(): string
    {
        return $this->srcUri;
    }

    public function getDepends(): array
    {
        return $this->depends;
    }

    public function getVersion(): string
    {
        return $this->version;
    }

    public function getMedia(): string
    {
        return $this->media;
    }
}
