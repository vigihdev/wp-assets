<?php

error_reporting(-1);

/** @var Composer\Autoload\ClassLoader $autoload  */
$autoload = require __DIR__ . '/../vendor/autoload.php';

// autoload Wp
$home = getenv('HOME') ?? '';
$autoloadWp = implode(DIRECTORY_SEPARATOR, [
    $home,
    'Sites',
    'okkarent-group',
    'okkarentorg',
    'wp-load.php',
]);

if (is_file($autoloadWp)) {
    require_once $autoloadWp;
}
