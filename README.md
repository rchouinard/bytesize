ByteSize: Nicely Formatted File Sizes
=====================================

ByteSize is a utility component for formatting file sizes in various formats.
It's currently a rough project and subject to some pretty major changes as I
think things through.


Usage
-----

Basic usage is very simple. Create an instance of `\ByteSize\ByteSize` and call
its `format()` method.

```php
<?php

// Default formatter is metric (kilobyte = 1000 bytes)
$bytesize = new \ByteSize\ByteSize;

// Outputs 1.44MB
echo $bytesize->format(1440000);
```

The default formatter may be customized as well, using either the
`\ByteSize\Formatter\Metric` or `\ByteSize\Formatter\Binary` classes. The metric
formatter is based on a 1000-byte kilobyte and uses standard SI suffixes (kB,
MB, GB, TB, etc). The binary formatter is based on a 1024-byte kilobyte and
uses the standard binary suffixes (KiB, MiB, GiB, TiB, etc). Both formatters
use a default precision of 2 significant digits in the formatted output, but
that can be changed to any number in the range 0-10 inclusive.

```php
<?php

// Use the binary formatter with a default precision of 1
$formatter = new \ByteSize\Formatter\Binary;
$formatter->setPrecision(1);
$bytesize = new \ByteSize\ByteSize($formatter);

// Outputs 1.4MiB
echo $bytesize->format(1509949);
```

Precision can also be set at call time via the second argument to the
`format()` methods.

If you don't care for all this OO stuff, the core `\ByteSize` class also
provides two static methods: `formatMetric()` and `formatBinary()`. The method
signatures are the same as the standard `format()` methods.

```php
<?php

use \ByteSize\ByteSize;

// Static methods also work in a pinch
echo ByteSize::formatMetric(1440000); // 1.44MB
echo ByteSize::formatBinary(1509949); // 1.44MiB
```


Requirements
------------

Just PHP 5.3+ and the BCMath extension. BCMath is used to handle very large
integer values and file sizes greater than 2GB on 32-bit systems.


Installation
------------

Installation is managed via Composer:

```json
"require": {
    "rych/bytesize": "dev-master"
}
```


Is that it?
-----------

Pretty much.
