<?php

namespace Administratix\Administratix\View\Composers;

use Illuminate\Support\HtmlString;
use Illuminate\View\View;
use Illuminate\Support\Str;

class ColorComposer
{
    /**
     * The array colors
     * 
     * @var array
     */
    protected $colors;

    /**
     * The top wrapper
     * 
     * @var string
     */
    protected $topWrapper = "<style>:root{";

    /**
     * The bottom wrapper
     * 
     * @var string
     */
    protected $bottomwWrapper = "}</style>";

    /**
     * The constructor of the class
     * 
     * @return void
     */
    public function __construct()
    {
        $this->colors = config('administratix.colors');
    }

    /**
     * Get the colors
     * 
     * @return string
     */
    public function getColors()
    {
        return collect($this->colors)->map(function($color, $declaration) {
            return "--color-{$declaration}: $color;";
        })-> implode('');
    }
    
    /**
     * Wrap the data
     * 
     * @return string
     */
    public function wrap($content)
    {
        return (string) Str::of($content)->prepend($this->topWrapper)->append($this->bottomwWrapper);
    }

    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('adminColors', new HtmlString($this->wrap($this->getColors()))) ;
    }
}