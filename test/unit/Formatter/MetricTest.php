<?php
/**
 * Rych ByteSize
 *
 * Simple byte size formatting library.
 *
 * @package   Rych\ByteSize
 * @copyright Copyright (c) 2014, Ryan Chouinard
 * @author    Ryan Chouinard <rchouinard@gmail.com>
 * @license   MIT
 */

namespace Rych\ByteSize\Formatter;

use PHPUnit_Framework_TestCase as TestCase;

/**
 * Metric formatter test
 *
 * Tests for the metric formatter class.
 */
class MetricTest extends TestCase
{

    /**
     * @var \Rych\ByteSize\Formatter\Metric
     */
    protected $formatter;

    /**
     * @inheritDoc
     */
    public function setUp()
    {
        $this->formatter = new Metric();
    }

    /**
     * Test that the format method returns expected values
     *
     * @test
     */
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
