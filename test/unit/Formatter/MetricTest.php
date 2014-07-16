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
     * Test that the format method honors the default precision
     *
     * @test
     */
    public function testFormatMethodHonorsDefaultPrecision()
    {
        $bytes = "2333333000"; // 2.333333 GB

        $this->formatter->setPrecision(3);
        $this->assertEquals(3, $this->formatter->getPrecision());
        $this->assertEquals("2.333GB", $this->formatter->format($bytes));
    }

    /**
     * Test that the format method can override the default precision
     *
     * @test
     */
    public function testFormatMethodCanOverrideDefaultPrecision()
    {
        $bytes = "2333333000"; // 2.333333 GB

        $this->assertEquals(2, $this->formatter->getPrecision());
        $this->assertEquals("2.333GB", $this->formatter->format($bytes, 3));
    }

    /**
     * Test that the format method returns expected values
     *
     * @test
     */
    public function testFormatMethodReturnsExpectedValues()
    {
        $this->assertEquals("5B",     $this->formatter->format("5"));
        $this->assertEquals("5.25kB", $this->formatter->format("5250"));
        $this->assertEquals("5.25MB", $this->formatter->format("5250000"));
        $this->assertEquals("5.25GB", $this->formatter->format("5250000000"));
        $this->assertEquals("5.25TB", $this->formatter->format("5250000000000"));
        $this->assertEquals("5.25PB", $this->formatter->format("5250000000000000"));
        $this->assertEquals("5.25EB", $this->formatter->format("5250000000000000000"));
        $this->assertEquals("5.25ZB", $this->formatter->format("5250000000000000000000"));
        $this->assertEquals("5.25YB", $this->formatter->format("5250000000000000000000000"));
    }

}
