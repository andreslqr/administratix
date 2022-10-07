<?php

namespace Administratix\Administratix\Providers;

use Illuminate\Support\Arr;
use Illuminate\Support\ServiceProvider as Base;
use Livewire\Livewire;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Illuminate\View\View as ViewFactory;
use Illuminate\Support\Str;


abstract class ServiceProvider extends Base
{
    /**
     * Register the livewire components
     *
     * @param array $components
     * @param string $prefix
     * @return void
     */
    protected function livewire(array $components, $prefix = '')
    {
        foreach($components as $alias => $component)
        {
            Livewire::component($prefix . $alias, $component);
        }
    }

    /**
     * Register variable helpers
     *
     * @return void
     * @param array $composers
     * @example [
     *              ['*' => \Composer::class],
     *              ['*' => \Composer::class]
     *          ]
     */
    protected function viewComposers(array $composers)
    {
        foreach($composers as $composer)
        {
            foreach(Arr::wrap($composer) as $variable => $class)
            {
                View::composer($variable, $class);
            }
        }
    }

    /**
     * Load configuration files
     *
     * @param string $folder
     * @return void
     */
    protected function configurations(string $folder)
    {
        foreach(File::allFiles($folder) as $file)
        {
            $this->mergeConfigFrom(
                (string) Str::of($file->getPathname()), 
                (string) Str::of($file->getRelativePathname())->beforeLast('.')->replace('/', '.')
            );
        }
    }

    /**
     * load the rules
     *
     * @param  array $rules
     * @return void
     */
    protected function rules(array $rules)
    {
        foreach($rules as $name => $rule)
        {
            Validator::extend($name, function($attribute, $value, $parameters, $validator) use ($rule) {
                return $this->app->make($rule, $parameters)->passes($attribute, $value);
            });
        }
    }

    /**
     * load middlewares
     *
     * @return void
     */
    protected function middlewares(array $middlewares)
    {
        foreach($middlewares as $alias => $middleware)
        {
            $this->app['router']->aliasMiddleware($alias, $middleware);
        }
    }

    /**
     * Register middlware groups
     *
     * @return void
     */
    protected function middlewareGroups(array $middlewareGroups)
    {
        foreach($middlewareGroups as $group => $middlewares)
        {
            $this->app['router']->middlewareGroup($group, $middlewares);
        }
    }

    /**
     * Register the components views via variable helpers
     *
     * @param  array $components
     * @return void
     */
    protected function componentVariables(array $components, $prefix = '')
    {
        foreach($components as $name => $component)
        {
            if(is_array($component))
            {
                $this->componentVariables($component, $prefix . ucfirst($name));
            }
            else
            {
                View::composer('*', function(ViewFactory $view) use ($prefix, $name, $component) {
                    $view->with((string) Str::of($name)->ucfirst()->start($prefix)->start("component"), $component);
                });
            }
        }
    }

    /**
     * Register singletons
     * 
     * @param  array|mixed $singletons
     * @return void
     */
    protected function registerSingletons($singletons)
    {
        foreach($singletons as $abstract => $concrete)
            $this->app->singleton($abstract, $concrete);
    }

    /**
     * Register binds
     * 
     * @param  array|mixed $binds
     * @return void
     */
    protected function registerBinds($binds)
    {
        foreach($binds as $abstract => $concrete)
            $this->app->bind($abstract, $concrete);
    }


    /**
     * Register the views
     * 
     * @param  array|mixed $paths
     * @param  string $prefix
     * @return void
     */
    protected function views($paths, $prefix = null)
    {
        foreach(Arr::wrap($paths) as $namespace => $path)
            $this->loadViewsFrom($path, is_null($prefix) ? $namespace : $prefix);
    }

    /**
     * Register the global composers
     * 
     * @param  array|mixed $composers
     * @param  string $view
     * @return void
     */
    protected function composers($composers, $view = '*')
    {
        foreach(Arr::wrap($composers) as $composer)
            View::composer(
                is_array($composer) ? $composer['view'] : $view,
                is_array($composer) ? $composer['composer'] : $composer);
    }
}