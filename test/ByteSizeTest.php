<?php

namespace Rych\ByteSize;

use PHPUnit_Framework_TestCase as TestCase;

class ByteSizeTest extends TestCase
{

    public function testFormatMetricMethod()
    {
        $this->assertEquals('5MB', ByteSize::formatMetric(5000000, 0));
    }

    public function testFormatBinaryMethod()
    {
        $this->assertEquals('5MiB', ByteSize::formatBinary(5242880, 0));
    }

}
