<?php

namespace Vigihdev\WpAssets\Tests\Service;

use PHPUnit\Framework\Attributes\Test;
use Vigihdev\WpAssets\Contracts\ScriptEnqueueInterface;
use Vigihdev\WpAssets\DTOs\ScriptEnqueueDto;
use Vigihdev\WpAssets\Service\JsManager;
use Vigihdev\WpAssets\Tests\TestCase;

final class JsManagerTest extends TestCase
{
    #[Test]
    public function it_can_be_instantiated_with_empty_assets(): void
    {
        $manager = new JsManager([]);

        $this->assertInstanceOf(JsManager::class, $manager);
    }

    #[Test]
    public function it_can_be_instantiated_with_script_enqueue_assets(): void
    {
        $mockAsset = $this->createMock(ScriptEnqueueInterface::class);
        
        $manager = new JsManager([$mockAsset]);

        $this->assertInstanceOf(JsManager::class, $manager);
    }

    #[Test]
    public function it_filters_non_script_enqueue_assets(): void
    {
        $mockAsset = $this->createMock(ScriptEnqueueInterface::class);
        $nonAsset = new \stdClass(); // Not a ScriptEnqueueInterface
        
        $manager = new JsManager([$mockAsset, $nonAsset]);

        $this->assertInstanceOf(JsManager::class, $manager);
    }

    #[Test]
    public function it_implements_publish_interface(): void
    {
        $manager = new JsManager([]);

        $this->assertTrue(method_exists($manager, 'publish'));
    }
}