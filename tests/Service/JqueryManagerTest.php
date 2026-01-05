<?php

namespace Vigihdev\WpAssets\Tests\Service;

use PHPUnit\Framework\Attributes\Test;
use Vigihdev\WpAssets\Contracts\ScriptEnqueueInterface;
use Vigihdev\WpAssets\Service\JqueryManager;
use Vigihdev\WpAssets\Tests\TestCase;

final class JqueryManagerTest extends TestCase
{
    #[Test]
    public function it_can_be_instantiated_with_script_enqueue_interface(): void
    {
        $mockJquery = $this->createMock(ScriptEnqueueInterface::class);
        
        $manager = new JqueryManager($mockJquery);

        $this->assertInstanceOf(JqueryManager::class, $manager);
    }

    #[Test]
    public function it_implements_publish_interface(): void
    {
        $mockJquery = $this->createMock(ScriptEnqueueInterface::class);
        
        $manager = new JqueryManager($mockJquery);

        $this->assertTrue(method_exists($manager, 'publish'));
    }
}