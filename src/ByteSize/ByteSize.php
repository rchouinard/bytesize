<?php
/**
 *
 */

namespace ByteSize;

/**
 *
 */
class ByteSize
{

    /**
     *
     * @var \ByteSize\Formatter\FormatterInterface
     */
    protected $formatter;

    /**
     * Class constructor.
     *
     * @param \ByteSize\Formatter\FormatterInterface $formatter
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
     * @staticvar \ByteSize\Formatter\Binary $formatter
     * @uses \ByteSize\Formatter\Binary::format()
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
     * @staticvar \ByteSize\Formatter\Metric $formatter
     * @uses \ByteSize\Formatter\Metric::format()
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
