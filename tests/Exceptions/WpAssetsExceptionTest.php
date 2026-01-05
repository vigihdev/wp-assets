<?php

namespace Vigihdev\WpAssets\Tests\Exceptions;

use PHPUnit\Framework\Attributes\Test;
use Vigihdev\WpAssets\Exceptions\WpAssetsException;
use Vigihdev\WpAssets\Tests\TestCase;

final class WpAssetsExceptionTest extends TestCase
{
    #[Test]
    public function it_can_be_instantiated_normally(): void
    {
        $exception = new WpAssetsException('Test message');

        $this->assertInstanceOf(WpAssetsException::class, $exception);
        $this->assertEquals('Test message', $exception->getMessage());
    }

    #[Test]
    public function it_creates_directory_not_found_exception(): void
    {
        $directory = '/non/existent/path';
        $exception = WpAssetsException::directoryNotFound($directory);

        $this->assertInstanceOf(WpAssetsException::class, $exception);
        $this->assertEquals("Directory not found: $directory", $exception->getMessage());
    }

    #[Test]
    public function it_creates_file_not_found_exception(): void
    {
        $file = '/non/existent/file.txt';
        $exception = WpAssetsException::fileNotFound($file);

        $this->assertInstanceOf(WpAssetsException::class, $exception);
        $this->assertEquals("File not found: $file", $exception->getMessage());
    }
}