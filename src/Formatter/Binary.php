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
 * Binary formatter
 *
 * Formats byte values using the binary standard values. This formatter
 * assumes 1 kilobyte = 1024 bytes.
 *
 * @link http://en.wikipedia.org/wiki/Binary_prefix Binary prefix at Wikipedia
 */
final class Binary extends AbstractFormatter
{

    /**
     * Base value used by this formatter
     *
     * @var integer
     */
    protected $base = 1024;

    /**
     * Suffixes used by this formatter
     *
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
