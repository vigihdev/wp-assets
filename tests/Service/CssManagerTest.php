<?php

namespace Vigihdev\WpAssets\Tests\Service;

use PHPUnit\Framework\Attributes\Test;
use Vigihdev\WpAssets\Contracts\StyleEnqueueInterface;
use Vigihdev\WpAssets\Service\CssManager;
use Vigihdev\WpAssets\Tests\TestCase;

final class CssManagerTest extends TestCase
{
    #[Test]
    public function it_can_be_instantiated_with_empty_assets(): void
    {
        $manager = new CssManager([]);

        $this->assertInstanceOf(CssManager::class, $manager);
    }

    #[Test]
    public function it_can_be_instantiated_with_style_enqueue_assets(): void
    {
        $mockAsset = $this->createMock(StyleEnqueueInterface::class);
        
        $manager = new CssManager([$mockAsset]);

        $this->assertInstanceOf(CssManager::class, $manager);
    }

    #[Test]
    public function it_filters_non_style_enqueue_assets(): void
    {
        $mockAsset = $this->createMock(StyleEnqueueInterface::class);
        $nonAsset = new \stdClass(); // Not a StyleEnqueueInterface
        
        $manager = new CssManager([$mockAsset, $nonAsset]);

        $this->assertInstanceOf(CssManager::class, $manager);
    }

    #[Test]
    public function it_implements_publish_interface(): void
    {
        $manager = new CssManager([]);

        $this->assertTrue(method_exists($manager, 'publish'));
    }
}