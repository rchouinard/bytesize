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
 * Metric formatter
 *
 * Formats byte values using the metric standard values. This formatter
 * assumes 1 kilobyte = 1000 bytes.
 *
 * @link http://en.wikipedia.org/wiki/Metric_prefix Metric prefix at Wikipedia
 */
final class Metric extends AbstractFormatter
{

    /**
     * Base value used by this formatter
     *
     * @var integer
     */
    protected $base = 1000;

    /**
     * Suffixes used by this formatter
     *
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
