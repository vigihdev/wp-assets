<?php

namespace Vigihdev\WpAssets\Tests\DTOs;

use PHPUnit\Framework\Attributes\Test;
use Vigihdev\WpAssets\DTOs\ScriptLocalizeDto;
use Vigihdev\WpAssets\Tests\TestCase;

final class ScriptLocalizeDtoTest extends TestCase
{
    #[Test]
    public function it_can_be_instantiated_with_default_parameters(): void
    {
        $dto = new ScriptLocalizeDto();

        $this->assertInstanceOf(ScriptLocalizeDto::class, $dto);
        $this->assertEquals('nonce-js', $dto->getHandle());
        $this->assertEquals('WP_API', $dto->getVariableName());
        $this->assertEquals('wp_ajax_', $dto->getActionPrefix());
        $this->assertEquals('wp_ajax_nonce', $dto->getNonce());
    }

    #[Test]
    public function it_can_be_instantiated_with_custom_parameters(): void
    {
        $handle = 'custom-js';
        $variableName = 'CUSTOM_API';
        $actionPrefix = 'custom_';
        $nonce = 'custom_nonce';
        $depends = ['jquery'];
        $actions = ['custom_action'];
        
        $dto = new ScriptLocalizeDto(
            handle: $handle,
            variableName: $variableName,
            actionPrefix: $actionPrefix,
            nonce: $nonce,
            depends: $depends,
            actions: $actions
        );

        $this->assertInstanceOf(ScriptLocalizeDto::class, $dto);
        $this->assertEquals($handle, $dto->getHandle());
        $this->assertEquals($variableName, $dto->getVariableName());
        $this->assertEquals($actionPrefix, $dto->getActionPrefix());
        $this->assertEquals($nonce, $dto->getNonce());
        $this->assertEquals($depends, $dto->getDepends());
        $this->assertEquals($actions, $dto->getActions());
    }

    #[Test]
    public function it_returns_empty_arrays_for_default_optional_parameters(): void
    {
        $dto = new ScriptLocalizeDto();

        $this->assertEquals([], $dto->getDepends());
        $this->assertEquals([], $dto->getActions());
    }
}