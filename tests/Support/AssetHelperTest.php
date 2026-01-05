<?php

namespace Vigihdev\WpAssets\Tests\Support;

use PHPUnit\Framework\Attributes\Test;
use Vigihdev\WpAssets\Support\AssetHelper;
use Vigihdev\WpAssets\Tests\TestCase;

final class AssetHelperTest extends TestCase
{
    #[Test]
    public function it_returns_true_if_path_is_directory(): void
    {
        $result = AssetHelper::isDir(__DIR__);

        $this->assertTrue($result);
    }

    #[Test]
    public function it_returns_false_if_path_is_not_directory(): void
    {
        $result = AssetHelper::isDir(__FILE__);

        $this->assertFalse($result);
    }

    #[Test]
    public function it_returns_true_if_path_is_file(): void
    {
        $result = AssetHelper::isFile(__FILE__);

        $this->assertTrue($result);
    }

    #[Test]
    public function it_returns_false_if_path_is_not_file(): void
    {
        $result = AssetHelper::isFile(__DIR__);

        $this->assertFalse($result);
    }

    #[Test]
    public function it_returns_false_if_file_is_not_readable(): void
    {
        // Test with a non-existent file
        $result = AssetHelper::isFile('/non/existent/file.txt');

        $this->assertFalse($result);
    }

    #[Test]
    public function it_returns_true_if_path_is_valid_url(): void
    {
        $result = AssetHelper::isUrl('https://example.com');

        $this->assertTrue($result);
    }

    #[Test]
    public function it_returns_false_if_path_is_not_valid_url(): void
    {
        $result = AssetHelper::isUrl('not-a-url');

        $this->assertFalse($result);
    }

    #[Test]
    public function it_resolves_handle_from_local_path(): void
    {
        $result = AssetHelper::resolveHandle('/path/to/script.js');

        $this->assertEquals('script', $result);
    }

    #[Test]
    public function it_resolves_handle_from_url(): void
    {
        $result = AssetHelper::resolveHandle('https://example.com/assets/style.css');

        $this->assertEquals('style', $result);
    }

    #[Test]
    public function it_generates_unique_id_from_single_argument(): void
    {
        $result = AssetHelper::cid('test');

        $this->assertIsString($result);
        $this->assertNotEmpty($result);
    }

    #[Test]
    public function it_generates_unique_id_from_multiple_arguments(): void
    {
        $result = AssetHelper::cid('test', 'value', '123');

        $this->assertIsString($result);
        $this->assertNotEmpty($result);
    }

    #[Test]
    public function it_generates_same_id_for_same_arguments(): void
    {
        $result1 = AssetHelper::cid('test', 'value');
        $result2 = AssetHelper::cid('test', 'value');

        $this->assertEquals($result1, $result2);
    }

    #[Test]
    public function it_generates_different_id_for_different_arguments(): void
    {
        $result1 = AssetHelper::cid('test1');
        $result2 = AssetHelper::cid('test2');

        $this->assertNotEquals($result1, $result2);
    }

    #[Test]
    public function it_gets_filename_from_path(): void
    {
        $result = AssetHelper::getFilename('/path/to/script.js');

        $this->assertEquals('script', $result);
    }

    #[Test]
    public function it_gets_filename_from_url_path(): void
    {
        $result = AssetHelper::getFilename('https://example.com/assets/style.css');

        $this->assertEquals('style', $result);
    }
}