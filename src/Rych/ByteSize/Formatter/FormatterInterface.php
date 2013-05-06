<?php
/**
 * ByteSize - A File Size Formatting Component
 *
 * @package Rych\ByteSize
 * @author Ryan Chouinard <rchouinard@gmail.com>
 * @copyright Copyright (c) 2013, Ryan Chouinard
 * @license MIT License - http://www.opensource.org/licenses/mit-license.php
 */

namespace Rych\ByteSize\Formatter;

/**
 * Formatter interface
 *
 * @package Rych\ByteSize
 * @author Ryan Chouinard <rchouinard@gmail.com>
 * @copyright Copyright (c) 2013, Ryan Chouinard
 * @license MIT License - http://www.opensource.org/licenses/mit-license.php
 */
interface FormatterInterface
{

    /**
     * Format input into a human-friendly string for display.
     *
     * @param integer|string $bytes Integer or string representing the number
     *     of bytes.
     * @param integer $precision Number of significant digits to include in the
     *     formatted output.
     * @return string Returns a human-friendly formatted string.
     */
    public function format($bytes, $precision);

}
