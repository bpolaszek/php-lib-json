# Introduction
This is a PHP library written to make it easy and safe to process JSON. It will
throw exceptions when encoding or decoding fails.

# Installation
You can use Composer to use this library in your application.

# Tests
You can run the PHPUnit tests if PHPUnit is installed:

    $ phpunit tests/

Do not forget to run `/path/to/composer.phar install` first.

# API
To use the library, see the example below:

    <?php
    require_once 'vendor/autoload.php';

    use fkooman\Json\Json;
    use fkooman\Json\JsonException;

    $json = new Json();
    echo $json->encode("foo") . PHP_EOL;
    echo $json->encode(array('foo' => 'bar')) . PHP_EOL;
    echo var_export($json->decode('{"foo":"bar"}'), true) . PHP_EOL;

    try {
        $json->decode('{');
    } catch (JsonException $e) {
        echo "ERROR: " . $e->getMessage(). PHP_EOL;
    }

This will output the following:

    "foo"
    {"foo":"bar"}
    array (
      'foo' => 'bar',
    )
    ERROR: Syntax error

# License
Licensed under the Apache License, Version 2.0;

   http://www.apache.org/licenses/LICENSE-2.0
