<?php

namespace Vigihdev\WpAssets\Tests\Service;

use PHPUnit\Framework\Attributes\Test;
use Vigihdev\WpAssets\Contracts\ScriptLocalizeInterface;
use Vigihdev\WpAssets\Service\JsLocalizerManager;
use Vigihdev\WpAssets\Tests\TestCase;

final class JsLocalizerManagerTest extends TestCase
{
    #[Test]
    public function it_can_be_instantiated_with_script_localize_interface(): void
    {
        $mockLocalize = $this->createMock(ScriptLocalizeInterface::class);
        
        $manager = new JsLocalizerManager($mockLocalize);

        $this->assertInstanceOf(JsLocalizerManager::class, $manager);
    }

    #[Test]
    public function it_implements_publish_interface(): void
    {
        $mockLocalize = $this->createMock(ScriptLocalizeInterface::class);
        
        $manager = new JsLocalizerManager($mockLocalize);

        $this->assertTrue(method_exists($manager, 'publish'));
    }
}