<?php

namespace Administratix\Administratix;

use Administratix\Administratix\Providers\ServiceProvider;
use Symfony\Component\Console\Output\ConsoleOutput;

class AdministratixServiceProvider extends ServiceProvider
{
    /**
     * Register the singletons
     * 
     * @return array
     */
    public function singletons() : array
    {
        return [
            'console-output' => fn($app) => new ConsoleOutput()
        ];
    }

    /**
     *  Register the binds
     * 
     * @return array
     */
    public function binds() : array
    {
        return [

        ];
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->configurations(__DIR__ . "/../config");
        $this->registerSingletons($this->singletons());
        $this->registerBinds($this->binds());
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        if($this->app->runningInConsole()) {
            $this->commands($this->app->config['administratix.commands']);
        }

        $this->views(__DIR__ . '/../resources/views', $this->app->config['administratix.views.prefix']);
        $this->views($this->app->config['administratix.views.paths']);
        $this->composers($this->app->config['administratix.views.composers']);
    }


}