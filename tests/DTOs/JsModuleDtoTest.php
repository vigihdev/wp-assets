<?php

namespace Vigihdev\WpAssets\Tests\DTOs;

use PHPUnit\Framework\Attributes\Test;
use Vigihdev\WpAssets\DTOs\JsModuleDto;
use Vigihdev\WpAssets\DTOs\JsOptionsDto;
use Vigihdev\WpAssets\Tests\TestCase;

final class JsModuleDtoTest extends TestCase
{
    #[Test]
    public function it_can_be_instantiated_with_required_parameters(): void
    {
        $jsOption = new JsOptionsDto();
        $dto = new JsModuleDto(
            basepath: '/path/to/js-modules',
            baseUrl: 'https://example.com/js-modules',
            version: '1.0.0',
            jsOption: $jsOption
        );

        $this->assertInstanceOf(JsModuleDto::class, $dto);
        $this->assertEquals('/path/to/js-modules', $dto->getBasepath());
        $this->assertEquals('https://example.com/js-modules', $dto->getBaseUrl());
        $this->assertEquals('1.0.0', $dto->getVersion());
        $this->assertSame($jsOption, $dto->getJsOptions());
    }

    #[Test]
    public function it_can_be_instantiated_with_optional_parameters(): void
    {
        $jsOption = new JsOptionsDto();
        $depends = ['jquery'];
        $js = ['module.js'];
        
        $dto = new JsModuleDto(
            basepath: '/path/to/js-modules',
            baseUrl: 'https://example.com/js-modules',
            version: '1.0.0',
            jsOption: $jsOption,
            depends: $depends,
            js: $js
        );

        $this->assertInstanceOf(JsModuleDto::class, $dto);
        $this->assertEquals($depends, $dto->getDepends());
        $this->assertEquals($js, $dto->getJs());
    }

    #[Test]
    public function it_returns_empty_arrays_for_default_optional_parameters(): void
    {
        $jsOption = new JsOptionsDto();
        $dto = new JsModuleDto(
            basepath: '/path/to/js-modules',
            baseUrl: 'https://example.com/js-modules',
            version: '1.0.0',
            jsOption: $jsOption
        );

        $this->assertEquals([], $dto->getDepends());
        $this->assertEquals([], $dto->getJs());
    }
}