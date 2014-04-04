<?php
/**
 * ByteSize - A File Size Formatting Component
 *
 * @package Rych\ByteSize
 * @author Ryan Chouinard <rchouinard@gmail.com>
 * @copyright Copyright (c) 2013, Ryan Chouinard
 * @license MIT License - http://www.opensource.org/licenses/mit-license.php
 */

namespace Rych\ByteSize;

/**
 * Main component class
 *
 * @package Rych\ByteSize
 * @author Ryan Chouinard <rchouinard@gmail.com>
 * @copyright Copyright (c) 2013, Ryan Chouinard
 * @license MIT License - http://www.opensource.org/licenses/mit-license.php
 */
class ByteSize
{

    /**
     *
     * @var \Rych\ByteSize\Formatter\FormatterInterface
     */
    protected $formatter;

    /**
     * Class constructor.
     *
     * @param \Rych\ByteSize\Formatter\FormatterInterface $formatter
     * @return void
     */
    public function __construct(Formatter\FormatterInterface $formatter = null)
    {
        if (!$formatter) {
            $formatter = new Formatter\Metric;
        }

        $this->formatter = $formatter;
    }

    /**
     * Proxy method for the formatter's format() method.
     *
     * @param integer|string $bytes Integer or string representing the number
     *     of bytes.
     * @param integer $precision Number of significant digits to include in the
     *     formatted output.
     * @return string Returns a human-friendly formatted string.
     */
    public function format($bytes, $precision = null)
    {
        return $this->formatter->format($bytes, $precision);
    }

    /**
     * Static proxy to the binary formatter's format() method.
     *
     * @staticvar \Rych\ByteSize\Formatter\Binary $formatter
     * @uses \Rych\ByteSize\Formatter\Binary::format()
     *
     * @param integer|string $bytes Integer or string representing the number
     *     of bytes.
     * @param integer $precision Number of significant digits to include in the
     *     formatted output.
     * @return string Returns a human-friendly formatted string.
     */
    public static function formatBinary($bytes, $precision = null)
    {
        static $formatter = null;
        if (!$formatter) {
            $formatter = new Formatter\Binary;
        }

        return $formatter->format($bytes, $precision);
    }

    /**
     * Static proxy to the metric formatter's format() method.
     *
     * @staticvar \Rych\ByteSize\Formatter\Metric $formatter
     * @uses \Rych\ByteSize\Formatter\Metric::format()
     *
     * @param integer|string $bytes Integer or string representing the number
     *     of bytes.
     * @param integer $precision Number of significant digits to include in the
     *     formatted output.
     * @return string Returns a human-friendly formatted string.
     */
    public static function formatMetric($bytes, $precision = null)
    {
        static $formatter = null;
        if (!$formatter) {
            $formatter = new Formatter\Metric;
        }

        return $formatter->format($bytes, $precision);
    }

}
