<?php

namespace Administratix\Administratix\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static void writeln($messages, int $options = self::OUTPUT_NORMAL)
 * @method static void write($messages, bool $newline = false, int $options = self::OUTPUT_NORMAL)
 * @method static \Symfony\Component\Console\Output\ConsoleSectionOutput section()
 * @method static void setDecorated(bool $decorated)
 * @method static void setFormatter(\Symfony\Component\Console\Formatter\OutputFormatterInterface $formatter)
 * @method static void setVerbosity(int $level)
 * @method static void getErrorOutput()
 * @method static void setErrorOutput(\Symfony\Component\Console\Output\OutputInterface $error
 * @method static void getStream()
 *
 * @see \Symfony\Component\Console\Output\ConsoleOutput
 */
class ConsoleOutput extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'console-output';
    }
}
