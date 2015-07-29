# ByteSize: File Size Formatter for PHP

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

ByteSize is a utility component for formatting file sizes in various formats.


## Requirements

 - PHP 5.3+
 - BCMath extension


## Install

Via Composer

``` bash
$ composer require rych/bytesize
```


## Usage

Basic usage is very simple. Create an instance of `Rych\ByteSize\ByteSize` and
call its `format()` method.

```php
<?php

// Default formatter is metric (kilobyte = 1000 bytes)
$bytesize = new \Rych\ByteSize\ByteSize;

// Outputs 1.44MB
echo $bytesize->format(1440000);
```

The default formatter may be customized as well, using either the
`\Rych\ByteSize\Formatter\Metric` or `\Rych\ByteSize\Formatter\Binary` classes.
The metric formatter is based on a 1000-byte kilobyte and uses standard SI
suffixes (kB, MB, GB, TB, etc). The binary formatter is based on a 1024-byte
kilobyte and uses the standard binary suffixes (KiB, MiB, GiB, TiB, etc). Both
formatters use a default precision of 2 significant digits in the formatted
output, but that can be changed to any number in the range 0-10 inclusive.

```php
<?php

// Use the binary formatter with a default precision of 1
$formatter = new \Rych\ByteSize\Formatter\Binary;
$formatter->setPrecision(1);
$bytesize = new \Rych\ByteSize\ByteSize($formatter);

// Outputs 1.4MiB
echo $bytesize->format(1509949);
```

Precision can also be set at call time via the second argument to the
`format()` methods.

If you don't care for all this OO stuff, the core `\Rych\ByteSize` class also
provides two static methods: `formatMetric()` and `formatBinary()`. The method
signatures are the same as the standard `format()` methods.

```php
<?php

use \Rych\ByteSize\ByteSize;

// Static methods also work in a pinch
echo ByteSize::formatMetric(1440000); // 1.44MB
echo ByteSize::formatBinary(1509949); // 1.44MiB
```


## Testing

``` bash
$ vendor/bin/phpunit -c phpunit.dist.xml
```


## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.


[ico-version]: https://img.shields.io/packagist/v/rych/bytesize.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/rchouinard/bytesize.svg?style=flat-square
[ico-coveralls]: https://img.shields.io/coveralls/rchouinard/bytesize.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/sensiolabs/i/06ed0bcf-8415-4d1e-9808-09c05e832318.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/rych/bytesize.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/rych/bytesize
[link-travis]: https://travis-ci.org/rchouinard/bytesize
[link-coveralls]: https://coveralls.io/r/rchouinard/bytesize
[link-code-quality]: https://insight.sensiolabs.com/projects/06ed0bcf-8415-4d1e-9808-09c05e832318
[link-downloads]: https://packagist.org/packages/rych/bytesize
[link-author]: https://github.com/rchouinard
[link-contributors]: https://github.com/rchouinard/bytesize/graphs/contributors
