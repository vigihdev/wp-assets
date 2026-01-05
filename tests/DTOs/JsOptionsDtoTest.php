<?php

namespace Vigihdev\WpAssets\Tests\DTOs;

use PHPUnit\Framework\Attributes\Test;
use Vigihdev\WpAssets\DTOs\JsOptionsDto;
use Vigihdev\WpAssets\Tests\TestCase;

final class JsOptionsDtoTest extends TestCase
{
    #[Test]
    public function it_can_be_instantiated_with_default_parameters(): void
    {
        $dto = new JsOptionsDto();

        $this->assertInstanceOf(JsOptionsDto::class, $dto);
        $this->assertNull($dto->getStrategy());
        $this->assertTrue($dto->getInFooter());
    }

    #[Test]
    public function it_can_be_instantiated_with_custom_parameters(): void
    {
        $dto = new JsOptionsDto(
            strategy: 'defer',
            inFooter: false
        );

        $this->assertInstanceOf(JsOptionsDto::class, $dto);
        $this->assertEquals('defer', $dto->getStrategy());
        $this->assertFalse($dto->getInFooter());
    }

    #[Test]
    public function it_returns_array_with_in_footer_when_strategy_is_null_and_in_footer_is_true(): void
    {
        $dto = new JsOptionsDto(
            strategy: null,
            inFooter: true
        );

        $expected = ['in_footer' => true];
        $this->assertEquals($expected, $dto->toArray());
    }

    #[Test]
    public function it_returns_array_with_strategy_when_strategy_is_set(): void
    {
        $dto = new JsOptionsDto(
            strategy: 'defer',
            inFooter: false
        );

        $expected = ['strategy' => 'defer'];
        $this->assertEquals($expected, $dto->toArray());
    }

    #[Test]
    public function it_returns_array_with_both_strategy_and_in_footer_when_both_are_set(): void
    {
        $dto = new JsOptionsDto(
            strategy: 'defer',
            inFooter: true
        );

        $expected = ['in_footer' => true, 'strategy' => 'defer'];
        $this->assertEquals($expected, $dto->toArray());
    }

    #[Test]
    public function it_returns_empty_array_when_both_strategy_is_null_and_in_footer_is_false(): void
    {
        $dto = new JsOptionsDto(
            strategy: null,
            inFooter: false
        );

        $expected = [];
        $this->assertEquals($expected, $dto->toArray());
    }
}