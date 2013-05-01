<?php
/**
 * ByteSize - A File Size Formatting Component
 *
 * @package ByteSize
 * @author Ryan Chouinard <rchouinard at gmail.com>
 * @license http://www.opensource.org/licenses/mit-license.html MIT License
 * @link https://github.com/rchouinard/bytesize Project at GitHub
 */

namespace ByteSize\Formatter;

/**
 * Formatter interface
 *
 * @package ByteSize
 * @author Ryan Chouinard <rchouinard at gmail.com>
 * @license http://www.opensource.org/licenses/mit-license.html MIT License
 * @link https://github.com/rchouinard/bytesize Project at GitHub
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
