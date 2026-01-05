<?php

namespace Vigihdev\WpAssets\Tests\DTOs;

use PHPUnit\Framework\Attributes\Test;
use Vigihdev\WpAssets\DTOs\StyleEnqueueDto;
use Vigihdev\WpAssets\Tests\TestCase;

final class StyleEnqueueDtoTest extends TestCase
{
    #[Test]
    public function it_can_be_instantiated_with_required_parameters(): void
    {
        $dto = new StyleEnqueueDto(
            handle: 'test-style',
            srcUri: 'https://example.com/style.css'
        );

        $this->assertInstanceOf(StyleEnqueueDto::class, $dto);
        $this->assertEquals('test-style', $dto->getHandle());
        $this->assertEquals('https://example.com/style.css', $dto->getSrcUri());
    }

    #[Test]
    public function it_can_be_instantiated_with_optional_parameters(): void
    {
        $version = '1.0.0';
        $depends = ['bootstrap'];
        $media = 'print';
        
        $dto = new StyleEnqueueDto(
            handle: 'test-style',
            srcUri: 'https://example.com/style.css',
            version: $version,
            depends: $depends,
            media: $media
        );

        $this->assertInstanceOf(StyleEnqueueDto::class, $dto);
        $this->assertEquals($version, $dto->getVersion());
        $this->assertEquals($depends, $dto->getDepends());
        $this->assertEquals($media, $dto->getMedia());
    }

    #[Test]
    public function it_returns_default_values_for_optional_parameters(): void
    {
        $dto = new StyleEnqueueDto(
            handle: 'test-style',
            srcUri: 'https://example.com/style.css'
        );

        $this->assertEquals('1.0', $dto->getVersion());
        $this->assertEquals([], $dto->getDepends());
        $this->assertEquals('all', $dto->getMedia());
    }
}