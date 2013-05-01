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
 * Binary file size formatter
 *
 * @package ByteSize
 * @author Ryan Chouinard <rchouinard at gmail.com>
 * @license http://www.opensource.org/licenses/mit-license.html MIT License
 * @link https://github.com/rchouinard/bytesize Project at GitHub
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
