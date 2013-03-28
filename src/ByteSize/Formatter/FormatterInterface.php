<?php
/**
 *
 */

namespace ByteSize\Formatter;

/**
 * Formatter interface
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
