<?php

namespace Vigihdev\WpAssets\Tests\DTOs;

use PHPUnit\Framework\Attributes\Test;
use Vigihdev\WpAssets\DTOs\AppAssetDto;
use Vigihdev\WpAssets\DTOs\JsOptionsDto;
use Vigihdev\WpAssets\Tests\TestCase;

final class AppAssetDtoTest extends TestCase
{
    #[Test]
    public function it_can_be_instantiated_with_required_parameters(): void
    {
        $jsOption = new JsOptionsDto();
        $dto = new AppAssetDto(
            basepath: '/path/to/assets',
            baseUrl: 'https://example.com/assets',
            version: '1.0.0',
            jsOption: $jsOption
        );

        $this->assertInstanceOf(AppAssetDto::class, $dto);
        $this->assertEquals('/path/to/assets', $dto->getBasepath());
        $this->assertEquals('https://example.com/assets', $dto->getBaseUrl());
        $this->assertEquals('1.0.0', $dto->getVersion());
        $this->assertSame($jsOption, $dto->getJsOptions());
    }

    #[Test]
    public function it_can_be_instantiated_with_optional_parameters(): void
    {
        $jsOption = new JsOptionsDto();
        $depends = ['jquery'];
        $js = ['script.js'];
        $css = ['style.css'];
        
        $dto = new AppAssetDto(
            basepath: '/path/to/assets',
            baseUrl: 'https://example.com/assets',
            version: '1.0.0',
            jsOption: $jsOption,
            depends: $depends,
            js: $js,
            css: $css
        );

        $this->assertInstanceOf(AppAssetDto::class, $dto);
        $this->assertEquals($depends, $dto->getDepends());
        $this->assertEquals($js, $dto->getJs());
        $this->assertEquals($css, $dto->getCss());
    }

    #[Test]
    public function it_returns_empty_arrays_for_default_optional_parameters(): void
    {
        $jsOption = new JsOptionsDto();
        $dto = new AppAssetDto(
            basepath: '/path/to/assets',
            baseUrl: 'https://example.com/assets',
            version: '1.0.0',
            jsOption: $jsOption
        );

        $this->assertEquals([], $dto->getDepends());
        $this->assertEquals([], $dto->getJs());
        $this->assertEquals([], $dto->getCss());
    }
}