<?php

namespace Vigihdev\WpAssets\Tests\DTOs;

use PHPUnit\Framework\Attributes\Test;
use Vigihdev\WpAssets\DTOs\JsOptionsDto;
use Vigihdev\WpAssets\DTOs\ScriptEnqueueDto;
use Vigihdev\WpAssets\Tests\TestCase;

final class ScriptEnqueueDtoTest extends TestCase
{
    #[Test]
    public function it_can_be_instantiated_with_required_parameters(): void
    {
        $jsOption = new JsOptionsDto();
        $dto = new ScriptEnqueueDto(
            handle: 'test-script',
            srcUri: 'https://example.com/script.js',
            jsOption: $jsOption
        );

        $this->assertInstanceOf(ScriptEnqueueDto::class, $dto);
        $this->assertEquals('test-script', $dto->getHandle());
        $this->assertEquals('https://example.com/script.js', $dto->getSrcUri());
        $this->assertSame($jsOption, $dto->getJsOption());
    }

    #[Test]
    public function it_can_be_instantiated_with_optional_parameters(): void
    {
        $jsOption = new JsOptionsDto();
        $version = '1.0.0';
        $depends = ['jquery'];
        $options = ['strategy' => 'defer'];
        
        $dto = new ScriptEnqueueDto(
            handle: 'test-script',
            srcUri: 'https://example.com/script.js',
            jsOption: $jsOption,
            version: $version,
            depends: $depends,
            options: $options
        );

        $this->assertInstanceOf(ScriptEnqueueDto::class, $dto);
        $this->assertEquals($version, $dto->getVersion());
        $this->assertEquals($depends, $dto->getDepends());
        $this->assertEquals($options, $dto->getOptions());
    }

    #[Test]
    public function it_returns_default_values_for_optional_parameters(): void
    {
        $jsOption = new JsOptionsDto();
        $dto = new ScriptEnqueueDto(
            handle: 'test-script',
            srcUri: 'https://example.com/script.js',
            jsOption: $jsOption
        );

        $this->assertFalse($dto->getVersion());
        $this->assertEquals([], $dto->getDepends());
        $this->assertEquals([], $dto->getOptions());
    }
}