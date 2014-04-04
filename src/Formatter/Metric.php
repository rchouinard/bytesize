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
 * Metric file size formatter
 *
 * @package Rych\ByteSize
 * @author Ryan Chouinard <rchouinard@gmail.com>
 * @copyright Copyright (c) 2013, Ryan Chouinard
 * @license MIT License - http://www.opensource.org/licenses/mit-license.php
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
