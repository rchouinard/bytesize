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

namespace Rych\ByteSize;

use PHPUnit_Framework_TestCase as TestCase;

/**
 * ByteSize test
 *
 * Tests for the ByteSize class.
 */
class ByteSizeTest extends TestCase
{

    /**
     * Test that the metric proxy returns expected value
     *
     * @test
     */
    public function testFormatMetricMethod()
    {
        $this->assertEquals('5MB', ByteSize::formatMetric(5000000, 0));
    }

    /**
     * Test that the binary proxy returns expected value
     *
     * @test
     */
    public function testFormatBinaryMethod()
    {
        $this->assertEquals('5MiB', ByteSize::formatBinary(5242880, 0));
    }

}
