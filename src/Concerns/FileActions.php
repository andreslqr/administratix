<?php

namespace Administratix\Administratix\Concerns;

use Administratix\Administratix\Exceptions\FileDoesNotExists;
use Administratix\Administratix\Facades\ConsoleOutput;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

trait FileActions
{
    /**
     * The clocks array
     *
     * @var array
     */
    protected $clock = [

    ];

    /**
     * Check if the file exists, if exists returns true, if not
     * throw an error, but if has the option, create the file
     * 
     * @param  string $filename
     * @param  string $reportIfNotExists
     * @return bool
     */
    protected function fileExists($filename, $reportIfNotExists = true)
    {
        if(File::exists($filename)) 
            return true;
        if($reportIfNotExists)
            throw new FileDoesNotExists($filename);
        
        return false;
    }
    
    /**
     * Replace the content of the file
     * 
     * @param  string $from
     * @param  string $to
     * @param  string $replacers
     * @return void
     */
    public function replaceFile($from, $to, $replacers = [], $reportIfNotExists = true)
    {
        $this->startClock("Replacing", $to);

        if($this->fileExists($from, $reportIfNotExists))
        {
            $content = Str::of(file_get_contents($from));
    
            foreach($replacers as $search => $replace)
                $content = $content->replace($search, $replace);
    
            file_put_contents($to, (string) $content);
        }

        $this->endClock("Replaced", $to);
    }

    /**
     * Delete a file 
     * 
     * @param  string $filepathname
     * @param  string $reportIfNotExists
     * @return bool
     */
    public function deleteFile($filepathname, $reportIfNotExists = true)
    {
        $this->startClock("Deleting", $filepathname);

        if($this->fileExists($filepathname, $reportIfNotExists))
            File::delete($filepathname);

        $this->endClock("Deleted", $filepathname);
    }

    /**
     * Copy a directory
     * 
     * @param  string $from
     * @param  string $reportIfNotExists
     * @param  string $to
     */
    public function copyDirectory($from, $to, $reportIfNotExists = true)
    {
        $this->startClock("Copying", $from);

        if($this->fileExists($from, $reportIfNotExists))
            File::copyDirectory($from, $to);

        $this->endClock("Copied", $from);
    }

    /**
     * Delete a directory
     * 
     * @param string $folderpathname
     * @param bool $reportIfNotExists
     */
    public function deleteDirectory($folderpathname, $reportIfNotExists = true)
    {
        $this->startClock("Deleting", $folderpathname);

        if($this->fileExists($folderpathname, $reportIfNotExists))
            File::deleteDirectory($folderpathname);

        $this->endClock("Deleted", $folderpathname);
    }

    /**
     * Start the commnand
     * 
     * @param  string $action
     * @param  string $file
     * @return void
     */
    private function startClock($action, $file)
    {
        method_exists($this, 'getOutput') ?
            $this->getOutput()->writeln("<comment>{$action}:</comment>  {$file}") :
            ConsoleOutput::writeln("<comment>{$action}:</comment>  {$file}");

        $this->clock[$file] = microtime(true);
    }

    /**
     * end the command
     * 
     * @return void
     */
    private function endClock($action, $file)
    {
        $runTime = number_format((microtime(true) - $this->clock[$file]) * 1000, 2);

        method_exists($this, 'getOutput') ?
            $this->getOutput()->writeln("<info>{$action}:</info>   {$file} ({$runTime}ms)") :
            ConsoleOutput::writeln("<info>{$action}:</info>   {$file} ({$runTime}ms)");
    }

}