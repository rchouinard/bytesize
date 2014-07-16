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

/**
 * ByteSize class
 *
 * Provides convenience access to the byte size formatters.
 */
class ByteSize
{

    /**
     * Default FormatterInterface instance
     *
     * @var Formatter\FormatterInterface
     */
    protected $formatter;

    /**
     * ByteSize constructor
     *
     * @param  Formatter\FormatterInterface $formatter Instance of
     *   FormatterInterface to use by default. If not passed, an instance of
     *   Formatter\Metric will be used.
     * @return void
     */
    public function __construct(Formatter\FormatterInterface $formatter = null)
    {
        if (!$formatter) {
            $formatter = new Formatter\Metric();
        }

        $this->formatter = $formatter;
    }

    /**
     * Formatter proxy
     *
     * @param  integer|string $bytes Integer or string representing the number
     *   of bytes.
     * @param  integer $precision Number of significant digits to include in the
     *   formatted output.
     * @return string Returns a human-friendly formatted string.
     */
    public function format($bytes, $precision = null)
    {
        return $this->formatter->format($bytes, $precision);
    }

    /**
     * Binary formatter static proxy
     *
     * @staticvar Formatter\Binary $formatter
     * @uses Formatter\Binary::format()
     *
     * @param  integer|string $bytes Integer or string representing the number
     *   of bytes.
     * @param  integer $precision Number of significant digits to include in the
     *   formatted output.
     * @return string Returns a human-friendly formatted string.
     */
    public static function formatBinary($bytes, $precision = null)
    {
        static $formatter = null;
        if (!$formatter) {
            $formatter = new Formatter\Binary();
        }

        return $formatter->format($bytes, $precision);
    }

    /**
     * Metric formatter static proxy
     *
     * @staticvar Formatter\Metric $formatter
     * @uses Formatter\Metric::format()
     *
     * @param  integer|string $bytes Integer or string representing the number
     *   of bytes.
     * @param  integer $precision Number of significant digits to include in the
     *   formatted output.
     * @return string Returns a human-friendly formatted string.
     */
    public static function formatMetric($bytes, $precision = null)
    {
        static $formatter = null;
        if (!$formatter) {
            $formatter = new Formatter\Metric();
        }

        return $formatter->format($bytes, $precision);
    }

}
