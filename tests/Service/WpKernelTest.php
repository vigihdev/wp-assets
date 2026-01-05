<?php

namespace Vigihdev\WpAssets\Tests\Service;

use PHPUnit\Framework\Attributes\Test;
use Symfony\Component\Filesystem\Path;
use Vigihdev\WpAssets\Tests\TestCase;
use Vigihdev\WpKernel\WpKernel;

final class WpKernelTest extends TestCase
{

    #[Test]
    public function it_boots_without_errors()
    {
        WpKernel::boot(
            basePath: Path::join(__DIR__, '..', '..'),
            configDir: 'config',
            enableAutoInjection: true,
        );

        // If no exception is thrown, the test passes.
        $this->assertTrue(true);
    }

    #[Test]
    public function it_throws_an_exception_if_config_directory_does_not_exist()
    {
        $this->expectException(\RuntimeException::class);

        WpKernel::boot(
            basePath: Path::join(__DIR__, '..', '..'),
            configDir: 'non_existent_config_dir',
            enableAutoInjection: true,
        );
    }
}
