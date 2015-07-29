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
 * Binary formatter test
 *
 * Tests for the binary formatter class.
 */
class BinaryTest extends TestCase
{

    /**
     * @var \Rych\ByteSize\Formatter\Binary
     */
    protected $formatter;

    /**
     * @inheritDoc
     */
    public function setUp()
    {
        $this->formatter = new Binary();
    }

    /**
     * Test that the format method honors the default precision
     *
     * @test
     */
    public function testFormatMethodHonorsDefaultPrecision()
    {
        $bytes = "2505397231"; // 2.333333 GiB

        $this->formatter->setPrecision(3);
        $this->assertEquals(3, $this->formatter->getPrecision());
        $this->assertEquals("2.333GiB", $this->formatter->format($bytes));
    }

    /**
     * Test that the format method can override the default precision
     *
     * @test
     */
    public function testFormatMethodCanOverrideDefaultPrecision()
    {
        $bytes = "2505397231"; // 2.333333 GiB

        $this->assertEquals(2, $this->formatter->getPrecision());
        $this->assertEquals("2.333GiB", $this->formatter->format($bytes, 3));
    }

    /**
     * Test that the format method returns expected values
     *
     * @test
     */
    public function testFormatMethodReturnsExpectedValues()
    {
        $this->assertEquals("5B",      $this->formatter->format("5"));
        $this->assertEquals("5.25KiB", $this->formatter->format("5376"));
        $this->assertEquals("5.25MiB", $this->formatter->format("5505024"));
        $this->assertEquals("5.25GiB", $this->formatter->format("5637144576"));
        $this->assertEquals("5.25TiB", $this->formatter->format("5772436045824"));
        $this->assertEquals("5.25PiB", $this->formatter->format("5910974510923776"));
        $this->assertEquals("5.25EiB", $this->formatter->format("6052837899185946624"));
        $this->assertEquals("5.25ZiB", $this->formatter->format("6198106008766409342976"));
        $this->assertEquals("5.25YiB", $this->formatter->format("6346860552976803167207424"));
    }

}
