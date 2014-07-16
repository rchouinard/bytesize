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

/**
 * Formatter interface
 *
 * Provides a standard interface for ByteSize formatters.
 */
interface FormatterInterface
{

    /**
     * Format input into a human-friendly string for display
     *
     * @param  integer|string $bytes Integer or string representing the number
     *   of bytes.
     * @param  integer $precision Number of significant digits to include in the
     *   formatted output.
     * @return string Returns a human-friendly formatted string.
     */
    public function format($bytes, $precision);

}
