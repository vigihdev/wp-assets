<?php

namespace Vigihdev\WpAssets\Tests\Service;

use PHPUnit\Framework\Attributes\Test;
use Vigihdev\WpAssets\Contracts\AppAssetInterface;
use Vigihdev\WpAssets\Exceptions\WpAssetsException;
use Vigihdev\WpAssets\Service\AppAssetManager;
use Vigihdev\WpAssets\Tests\TestCase;

final class AppAssetManagerTest extends TestCase
{
    #[Test]
    public function it_throws_exception_if_basepath_does_not_exist(): void
    {
        $mockAsset = $this->createMock(AppAssetInterface::class);
        $mockAsset->method('getBasepath')->willReturn('/non/existent/path');

        $this->expectException(WpAssetsException::class);
        $this->expectExceptionMessage('Directory not found: /non/existent/path');

        new AppAssetManager($mockAsset);
    }

    #[Test]
    public function it_can_be_instantiated_with_valid_basepath(): void
    {
        $mockAsset = $this->createMock(AppAssetInterface::class);
        $mockAsset->method('getBasepath')->willReturn(__DIR__); // Use existing directory

        $manager = new AppAssetManager($mockAsset);

        $this->assertInstanceOf(AppAssetManager::class, $manager);
    }

    #[Test]
    public function it_implements_publish_interface(): void
    {
        $mockAsset = $this->createMock(AppAssetInterface::class);
        $mockAsset->method('getBasepath')->willReturn(__DIR__); // Use existing directory

        $manager = new AppAssetManager($mockAsset);

        $this->assertTrue(method_exists($manager, 'publish'));
    }
}
