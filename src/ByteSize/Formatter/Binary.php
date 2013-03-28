<?php
/**
 *
 */

namespace ByteSize\Formatter;

/**
 * Binary file size formatter
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
