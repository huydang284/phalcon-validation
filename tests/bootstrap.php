<?php

require_once __DIR__ . '/../vendor/autoload.php';

// Register autoloaders
$loader = new \Phalcon\Loader();
/**
 * We register here the used directories, including the tests one, otherwise the TestCase couldn't be found.
 */
$loader->registerNamespaces([
    'HuyDang\PhalconValidation\Validator' => dirname(__DIR__) . '/src/Validator',
    'HuyDang\PhalconValidation\Tests' => dirname(__DIR__) . '/tests'
]);
$loader->register();
