<?php


namespace Administratix\Administratix\Console;

use Administratix\Administratix\Concerns\FileActions;
use Illuminate\Console\Command;

class Installer extends Command
{
    use FileActions;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'administratix:install';
 
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run the installer adding the administratix stuff in your app';
 
    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->copyResources();
        $this->removeResources();
    }

    /**
     * Copy the resources
     * 
     * @return void
     */
    public function copyResources()
    {
        $this->copyDirectory(__DIR__ . '/../../resources/sass', resource_path('admin/sass'));
        $this->copyDirectory(__DIR__ . '/../../resources/js', resource_path('admin/js'));
        $this->copyDirectory(__DIR__ . '/../../resources/images', resource_path('admin/images'));
        $this->replaceFile(__DIR__ . '/../../resources/tailwind.config.js', base_path('tailwind.config.js'));
        $this->replaceFile(__DIR__ . '/../../resources/vite.config.js', base_path('vite.config.js'));
        $this->replaceFile(__DIR__ . '/../../resources/package.json', base_path('package.json'));
        $this->replaceFile(__DIR__ . '/../../resources/postcss.config.js', base_path('postcss.config.js'));
    }

    /**
     * Remove all the old resources
     * 
     * @return void
     */
    public function removeResources()
    {
        $this->deleteFile(resource_path('views/welcome.blade.php'));
        $this->deleteDirectory(resource_path('css'));
        $this->deleteDirectory(resource_path('js'));
        $this->deleteDirectory(resource_path('views'));
    }
}