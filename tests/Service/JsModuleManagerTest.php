<?php

namespace Vigihdev\WpAssets\Tests\Service;

use PHPUnit\Framework\Attributes\Test;
use Vigihdev\WpAssets\Contracts\JsModuleInterface;
use Vigihdev\WpAssets\Exceptions\WpAssetsException;
use Vigihdev\WpAssets\Service\JsModuleManager;
use Vigihdev\WpAssets\Tests\TestCase;

final class JsModuleManagerTest extends TestCase
{
    #[Test]
    public function it_throws_exception_if_basepath_does_not_exist(): void
    {
        $mockJsModule = $this->createMock(JsModuleInterface::class);
        $mockJsModule->method('getBasepath')->willReturn('/non/existent/path');

        $this->expectException(WpAssetsException::class);
        $this->expectExceptionMessage('Directory not found: /non/existent/path');

        new JsModuleManager($mockJsModule);
    }

    #[Test]
    public function it_can_be_instantiated_with_valid_basepath(): void
    {
        $mockJsModule = $this->createMock(JsModuleInterface::class);
        $mockJsModule->method('getBasepath')->willReturn(__DIR__); // Use existing directory

        $manager = new JsModuleManager($mockJsModule);

        $this->assertInstanceOf(JsModuleManager::class, $manager);
    }

    #[Test]
    public function it_implements_publish_interface(): void
    {
        $mockJsModule = $this->createMock(JsModuleInterface::class);
        $mockJsModule->method('getBasepath')->willReturn(__DIR__); // Use existing directory

        $manager = new JsModuleManager($mockJsModule);

        $this->assertTrue(method_exists($manager, 'publish'));
    }
}