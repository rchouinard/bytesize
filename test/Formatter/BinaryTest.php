<?php

namespace Rych\ByteSize\Formatter;

use PHPUnit_Framework_TestCase as TestCase;

class BinaryTest extends TestCase
{

    protected $formatter;

    public function setUp()
    {
        $this->formatter = new Binary();
    }

    public function testConvertMethod()
    {
        $this->assertEquals('1B',      $this->formatter->format(bcmul(1.00, bcpow(1024, 0))));
        $this->assertEquals('1.00KiB', $this->formatter->format(bcmul(1.00, bcpow(1024, 1))));
        $this->assertEquals('1.25KiB', $this->formatter->format(bcmul(1.25, bcpow(1024, 1))));
        $this->assertEquals('1.50MiB', $this->formatter->format(bcmul(1.50, bcpow(1024, 2))));
        $this->assertEquals('1.75GiB', $this->formatter->format(bcmul(1.75, bcpow(1024, 3))));
        $this->assertEquals('2.00TiB', $this->formatter->format(bcmul(2.00, bcpow(1024, 4))));
        $this->assertEquals('2.25PiB', $this->formatter->format(bcmul(2.25, bcpow(1024, 5))));
        $this->assertEquals('2.50EiB', $this->formatter->format(bcmul(2.50, bcpow(1024, 6))));
        $this->assertEquals('2.75ZiB', $this->formatter->format(bcmul(2.75, bcpow(1024, 7))));
        $this->assertEquals('3.00YiB', $this->formatter->format(bcmul(3.00, bcpow(1024, 8))));
    }

}
