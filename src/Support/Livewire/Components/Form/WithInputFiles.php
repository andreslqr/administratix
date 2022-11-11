<?php


namespace Administratix\Administratix\Support\Livewire\Components\Form;

use Illuminate\Support\Arr;

trait WithInputFiles
{
    /**
     * Remove the file
     * 
     * @param  string $attribute
     * @param  string|array $index
     */
    public function removeFile($attribute, $index = 0)
    {
        $indexes = Arr::wrap($index);
        
        foreach($indexes as $index)
        {
            if(is_array($this->{$attribute}))
                unset($this->{$attribute}[$index]);
            else
                unset($this->{$attribute});
        }

        $this->emitSelf(config('administratix.general.livewire.events.file.remove-files'), $indexes);
    }
}