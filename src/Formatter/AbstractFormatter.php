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
 * Abstract formatter
 *
 * Provides base functionality for ByteSize formatters.
 */
abstract class AbstractFormatter implements FormatterInterface
{

    /**
     * Base value used by this formatter
     *
     * @var integer
     */
    protected $base;

    /**
     * Default precision value
     *
     * Affects the number of significant digits to include in the formatted
     * value.
     *
     * @var integer
     */
    protected $precision = 2;

    /**
     * Suffixes used by this formatter
     *
     * @var array
     */
    protected $suffixes = array ();

    /**
     * Format input into a human-friendly string for display
     *
     * @uses \bccomp()
     * @uses AbstractFormatter::divPow()
     * @uses AbstractFormatter::formatNumber()
     * @uses AbstractFormatter::normalizeBytes()
     *
     * @param  integer|string $bytes Integer or string representing the number
     *   of bytes.
     * @param  integer $precision Number of significant digits to include in the
     *   formatted output. Defaults to 2.
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
     * Get the default precision value
     *
     * @return integer Returns the currently configured precision.
     */
    public function getPrecision()
    {
        return $this->precision;
    }

    /**
     * Set the default precision value
     *
     * @uses AbstractFormatter::normalizePrecision()
     *
     * @param  integer $precision An integer between 0 and 10.
     * @return AbstractFormatter Returns an instance of self for method
     *   chaining.
     */
    public function setPrecision($precision)
    {
        $this->precision = $this->normalizePrecision($precision);

        return $this;
    }

    /**
     * Divide a dividend by result of power operation
     *
     * The return value will be a string representation of the result. This is
     * due to the BCMath library and so we can work with very large integers.
     *
     * @uses \bcdiv()
     * @uses \bcpow()
     *
     * @param  integer|string $dividend The dividend to use in the division
     *   operation.
     * @param  integer $base The base for the power operation.
     * @param  integer $power The power $base should be raised by.
     * @return string Returns the result of the operations.
     */
    protected function divPow($dividend, $base, $power)
    {
        return bcdiv($dividend, bcpow($base, $power, 10), 10);
    }

    /**
     * Format a float value with given suffix
     *
     * @uses AbstractFormatter::normalizePrecision()
     *
     * @param  integer|float $float The number to format.
     * @param  string $suffix The suffix to attach.
     * @param  integer $precision The number of significant digits to include.
     * @return string Returns the formatted string.
     */
    protected function formatNumber($float, $suffix, $precision = null)
    {
        if ($precision === null) {
            $precision = $this->precision;
        }
        $precision = $this->normalizePrecision($precision);

        return sprintf("%.{$precision}f%s", $float, $suffix);
    }

    /**
     * Normalize bytes value
     *
     * The resulting value is a string representation of the bytes value. This
     * is done by the BCMath library so we can work with very large integer
     * values.
     *
     * @uses \bcadd()
     * @uses \bccomp()
     * @uses \filter_var()
     *
     * @param  integer|float|string $bytes The bytes value.
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
     * Normalize precision value
     *
     * The resulting value is an integer value between 0 and 10.
     *
     * @uses \filter_var()
     *
     * @param  integer $precision The precision value.
     * @return integer Returns the normalized value.
     */
    protected function normalizePrecision($precision)
    {
        $precisionFiltered = filter_var($precision, FILTER_SANITIZE_NUMBER_INT);

        return (int) min(10, max(0, $precisionFiltered));
    }

}
