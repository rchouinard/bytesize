<?php
/**
 *
 */

namespace ByteSize\Formatter;

/**
 * Metric file size formatter
 */
final class Metric extends AbstractFormatter implements FormatterInterface
{

    /**
     * @var integer
     */
    protected $base = 1000;

    /**
     * @var array
     */
    protected $suffixes = array (
        8 => 'YB',
        7 => 'ZB',
        6 => 'EB',
        5 => 'PB',
        4 => 'TB',
        3 => 'GB',
        2 => 'MB',
        1 => 'kB',
    );

}
