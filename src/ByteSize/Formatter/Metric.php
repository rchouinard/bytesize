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
 * Metric file size formatter
 *
 * @package ByteSize
 * @author Ryan Chouinard <rchouinard at gmail.com>
 * @license http://www.opensource.org/licenses/mit-license.html MIT License
 * @link https://github.com/rchouinard/bytesize Project at GitHub
 * @link http://en.wikipedia.org/wiki/Metric_prefix Metric prefix at Wikipedia
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
