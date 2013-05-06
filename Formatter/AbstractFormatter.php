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
 * Abstract formatter
 *
 * @package Rych\ByteSize
 * @author Ryan Chouinard <rchouinard@gmail.com>
 * @copyright Copyright (c) 2013, Ryan Chouinard
 * @license MIT License - http://www.opensource.org/licenses/mit-license.php
 */
abstract class AbstractFormatter
{

    /**
     * @var integer
     */
    protected $base;

    /**
     * @var integer
     */
    protected $precision = 2;

    /**
     * @var array
     */
    protected $suffixes = array ();

    /**
     * Format input into a human-friendly string for display.
     *
     * @uses \bccomp()
     * @uses \Rych\ByteSize\Formatter\AbstractFormatter::divPow()
     * @uses \Rych\ByteSize\Formatter\AbstractFormatter::formatNumber()
     * @uses \Rych\ByteSize\Formatter\AbstractFormatter::normalizeBytes()
     *
     * @param integer|string $bytes Integer or string representing the number
     *     of bytes.
     * @param integer $precision Number of significant digits to include in the
     *     formatted output. Defaults to 2.
     * @return string Returns a human-friendly formatted string.
     */
    public function format($bytes, $precision = null)
    {
        $bytes = $this->normalizeBytes($bytes);
        $out = $bytes . 'B';

        foreach ($this->suffixes as $power => $suffix) {
            if (bccomp($calc = $this->divPow($bytes, $this->base, $power), 1) >= 0) {
                $out = $this->formatNumber($calc, $suffix, $precision);
                break;
            }
        }

        return $out;
    }

    /**
     * Get the currently configured default precision value.
     *
     * @return integer Returns the currently configured precision.
     */
    public function getPrecision()
    {
        return $this->precision;
    }

    /**
     * Set the default precision value.
     *
     * @uses \Rych\ByteSize\Formatter\AbstractFormatter::normalizePrecision()
     *
     * @param integer $precision An integer between 0 and 10.
     * @return \Rych\ByteSize\Formatter\AbstractFormatter Returns an instance of
     *     self for method chaining.
     */
    public function setPrecision($precision)
    {
        $this->precision = $this->normalizePrecision($precision);

        return $this;
    }

    /**
     * Shortcut method to divide a dividend by the result of a power operation.
     *
     * The return value will be a string representation of the result. This is
     * due to the BCMath library and so we can work with very large integers.
     *
     * @uses \bcdiv()
     * @uses \bcpow()
     *
     * @param integer|string $dividend The dividend to use in the division
     *     operation.
     * @param integer $base The base for the power operation.
     * @param integer $power The power $base should be raised by.
     * @return string Returns the result of the operations.
     */
    protected function divPow($dividend, $base, $power)
    {
        return bcdiv($dividend, bcpow($base, $power, 10), 10);
    }

    /**
     * Format a number with the given suffix and precision.
     *
     * @uses \Rych\ByteSize\Formatter\AbstractFormatter::normalizePrecision()
     *
     * @param integer|float $float The number to format.
     * @param string $suffix The suffix to attach.
     * @param integer $precision The number of significant digits to include.
     * @return string Returns the formatted string.
     */
    protected function formatNumber($float, $suffix, $precision = null)
    {
        if ($precision === null) {
            $precision = $this->precision;
        };
        $precision = $this->normalizePrecision($precision);

        return sprintf("%.{$precision}f%s", $float, $suffix);
    }

    /**
     * Normalize bytes value into a usable value.
     *
     * The resulting value is a string representation of the bytes value. This
     * is done by the BCMath library so we can work with very large integer
     * values.
     *
     * @uses \bcadd()
     * @uses \bccomp()
     * @uses \filter_var()
     *
     * @param integer|float|string $bytes The bytes value.
     * @return string Returns the normalized value.
     */
    protected function normalizeBytes($bytes)
    {
        $filteredBytes = filter_var($bytes, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        list ($bytes, $part) = explode('.', $filteredBytes . '.0');
        if (bccomp($part, 0) == 1) {
            $bytes = bcadd($bytes, 1);
        }

        return $bytes;
    }

    /**
     * Normalize precision value into a usable value.
     *
     * The resulting value is an integer value between 0 and 10.
     *
     * @uses \filter_var()
     *
     * @param integer $precision The precision value.
     * @return integer Returns the normalized value.
     */
    protected function normalizePrecision($precision)
    {
        $precisionFiltered = filter_var($precision, FILTER_SANITIZE_NUMBER_INT);

        return (int) min(10, max(0, $precisionFiltered));
    }

}
