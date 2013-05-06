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
 * Binary file size formatter
 *
 * @package Rych\ByteSize
 * @author Ryan Chouinard <rchouinard@gmail.com>
 * @copyright Copyright (c) 2013, Ryan Chouinard
 * @license MIT License - http://www.opensource.org/licenses/mit-license.php
 * @link http://en.wikipedia.org/wiki/Binary_prefix Binary prefix at Wikipedia
 */
final class Binary extends AbstractFormatter implements FormatterInterface
{

    /**
     * @var integer
     */
    protected $base = 1024;

    /**
     * @var array
     */
    protected $suffixes = array (
        8 => 'YiB',
        7 => 'ZiB',
        6 => 'EiB',
        5 => 'PiB',
        4 => 'TiB',
        3 => 'GiB',
        2 => 'MiB',
        1 => 'KiB',
    );

}
