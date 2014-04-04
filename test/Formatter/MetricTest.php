<?php

namespace Rych\ByteSize\Formatter;

use PHPUnit_Framework_TestCase as TestCase;

class MetricTest extends TestCase
{

    protected $formatter;

    public function setUp()
    {
        $this->formatter = new Metric();
    }

    public function testConvertMethod()
    {
        $this->assertEquals('1B',     $this->formatter->format(bcmul(1.00, bcpow(1000, 0))));
        $this->assertEquals('1.00kB', $this->formatter->format(bcmul(1.00, bcpow(1000, 1))));
        $this->assertEquals('1.25kB', $this->formatter->format(bcmul(1.25, bcpow(1000, 1))));
        $this->assertEquals('1.50MB', $this->formatter->format(bcmul(1.50, bcpow(1000, 2))));
        $this->assertEquals('1.75GB', $this->formatter->format(bcmul(1.75, bcpow(1000, 3))));
        $this->assertEquals('2.00TB', $this->formatter->format(bcmul(2.00, bcpow(1000, 4))));
        $this->assertEquals('2.25PB', $this->formatter->format(bcmul(2.25, bcpow(1000, 5))));
        $this->assertEquals('2.50EB', $this->formatter->format(bcmul(2.50, bcpow(1000, 6))));
        $this->assertEquals('2.75ZB', $this->formatter->format(bcmul(2.75, bcpow(1000, 7))));
        $this->assertEquals('3.00YB', $this->formatter->format(bcmul(3.00, bcpow(1000, 8))));
    }

}
