<?php

namespace Administratix\Administratix\Support\Livewire\Components\Form\Input\Widget;

use Administratix\Administratix\Support\Livewire\Components\Form\Input\Widget;

/**
 * @property string $altFormat Exactly the same as date format, but for the altInput field
 * @property bool $altInput Show the user a readable date (as per altFormat), but return something totally different to the server.
 * @property string $altInputClass This class will be added to the input element created by the altInput option.  Note that altInput already inherits classes from the original input.
 * @property bool $allowInput Allows the user to enter a date directly into the input field. By default, direct entry is disabled
 * @property bool $allowInvalidPreload Allows the preloading of an invalid date. When disabled, the field will be cleared if the provided date is invalid
 * @property string $appendTo Instead of body, appends the calendar to the specified node instead*.
 * @property string $ariaDateFormat Defines how the date will be formatted in the aria-label for calendar days, using the same tokens as dateFormat. If you change this, you should choose a value that will make sense if a screen reader reads it out loud.
 * @property string $conjunction When in "multiple" mode, conjunction is used to separate dates in the entry field.
 * @property bool $clickOpens Whether clicking on the input should open the picker. You could disable this if you wish to open the calendar manually with.open()
 * @property string $dateFormat A string of characters which are used to define how the date will be displayed in the input box.
 * @property string $defaultDate Sets the initial selected date(s).
 * @property int $defaultHour Initial value of the hour element.
 * @property int $defaultMinute Initial value of the minute element.
 * @property array $disable See Disabling dates
 * @property bool $disableMobile By default, flatpickr utilizes native datetime widgets unless certain options (e.g. disable) are used.
 * @property array $enable 
 * @property bool $enableTime Enables time picker
 * @property bool $enableSeconds Enables seconds in the time picker.
 * @property int $hourIncrement Adjusts the step for the hour input (incl. scrolling)
 * @property bool $inline Displays the calendar inline
 * @property string $maxDate The maximum date that a user can pick to (inclusive).
 * @property string $minDate The minimum date that a user can start picking from (inclusive).
 * @property int $minuteIncrement Adjusts the step for the minute input (incl. scrolling)
 * @property string $mode "single", "multiple", or "range"
 * @property string $nextArrow HTML for the arrow icon, used to switch months.
 * @property bool $noCalendar Hides the day selection in calendar. Use it along with enableTime to create a time picker.
 * @property string $position Where the calendar is rendered relative to the input vertically and horizontally. In the format of "[vertical] [horizontal]". Vertical can be auto, above or below (required). Horizontal can be left, center or right.
 * @property string $positionElement The element off of which the calendar will be positioned.
 * @property string $prevArrow HTML for the left arrow icon.
 * @property bool $shorthandCurrentMonth Show the month using the shorthand version (ie, Sep instead of September).
 * @property bool $static Position the calendar inside the wrapper and next to the input element*.
 * @property bool $showMonths The number of months to be shown at the same time when displaying the calendar.
 * @property bool $time_24hr Displays time picker in 24 hour mode without AM/PM selection when enabled.
 * @property bool $weekNumbers Enables display of week numbers in calendar.
 * @property bool $wrap 
 * @property string $monthSelectorType
 * @method void changeMonth(monthNum, is_offset = true)
 * @method void clear()
 * @method void close()
 * @method void destroy()
 * @method void formatDate($dateObj, $formatStr)
 * @method void jumpToDate($date, $triggerChange)
 * @method void open()
 * @method void parseDate($dateStr, $dateFormat)
 * @method void redraw()
 * @method void setDate($date, $triggerChange, $dateStrFormat)
 * @method void toggle()
 * @method void onChange()
 * @method void onOpen()
 * @method void onClose()
 * @method void onMonthChange()
 * @method void onYearChange()
 * @method void onReady()
 * @method void onValueUpdate()
 * @method void onDayCreate()
 */
class Flatpickr extends Widget
{
    /**
     * The array options for js with values
     * 
     * @var array
     */
    protected array $jsOptions = [
        'static' => true
    ];

    /**
     * The array options for js
     * 
     * @var array
     */
    protected array $jsAvailableOptions = [
        'altFormat',
        'altInput',
        'altInputClass',
        'allowInput',
        'allowInvalidPreload',
        'appendTo',
        'ariaDateFormat',
        'conjunction',
        'clickOpens',
        'dateFormat',
        'defaultDate',
        'defaultHour',
        'defaultMinute',
        'disable',
        'disableMobile',
        'enable',
        'enableTime',
        'enableSeconds',
        'hourIncrement',
        'inline',
        'maxDate',
        'minDate',
        'minuteIncrement',
        'mode',
        'nextArrow',
        'noCalendar',
        'position',
        'positionElement',
        'prevArrow',
        'shorthandCurrentMonth',
        'static',
        'showMonths',
        'time_24hr',
        'weekNumbers',
        'wrap',
        'monthSelectorType'
    ];

    /**
     * The available methods for js instance
     * 
     * @var array
     */
    protected array $jsAvailableMethods = [
        'changeMonth',
        'clear',
        'close',
        'destroy',
        'formatDate',
        'jumpToDate',
        'open',
        'parseDate',
        'redraw',
        'setDate',
        'toggle'
    ];

     /**
     * The available events for js instance
     * 
     * @var array
     */
    protected array $jsAvailableEvents = [
        'onChange',
        'onOpen',
        'onClose',
        'onMonthChange',
        'onYearChange',
        'onReady',
        'onValueUpdate',
        'onDayCreate'
    ];
}