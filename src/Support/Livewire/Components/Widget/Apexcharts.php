<?php

namespace Administratix\Administratix\Support\Livewire\Components\Widget;

use Administratix\Administratix\Support\Livewire\Components\Form\Input\Widget;

class Apexcharts extends Widget
{
    /**
     * The name of the component widget
     * 
     * @var string
     */
    protected $widgetName = 'apexcharts';

     /**
     * The array options for js with values
     * 
     * @var array
     */
    protected array $jsOptions = [
        
    ];

    /**
     * The array options for js
     * 
     * @var array
     */
    protected array $jsAvailableOptions = [
        'annotations',
        'chart',
        'colors',
        'dataLabels',
        'fill',
        'forecastDataPoints',
        'grid',
        'labels',
        'legend',
        'markers',
        'noData',
        'plotOptions',
        'responsive',
        'series',
        'states',
        'stroke',
        'subtitle',
        'theme',
        'title',
        'tooltip',
        'xaxis',
        'yaxis'
    ];

     /**
     * The available methods for js instance
     * 
     * @var array
     */
    protected array $jsAvailableMethods = [
        'render',
        'updateOptions',
        'updateSeries',
        'appendSeries',
        'toggleSeries',
        'showSeries',
        'hideSeries',
        'zoomX',
        'resetSeries',
        'appendData',
        'toggleDataPointSelection',
        'addXaxisAnnotation',
        'addYaxisAnnotation',
        'addPointAnnotation',
        'removeAnnotation',
        'clearAnnotations',
        'dataURI',
        'destroy'
    ];

    /**
     * The available events for js instance
     * 
     * @var array
     */
    protected array $jsAvailableEvents = [
        'animationEnd',
        'beforeMount',
        'mounted',
        'updated',
        'mouseMove',
        'mouseLeave',
        'click',
        'legendClick',
        'markerClick',
        'xAxisLabelClick',
        'selection',
        'dataPointSelection',
        'dataPointMouseEnter',
        'dataPointMouseLeave',
        'beforeZoom',
        'beforeResetZoom',
        'zoomed',
        'scrolled',
        'scrolled',
    ];
}