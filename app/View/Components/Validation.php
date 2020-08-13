<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Validation extends Component
{
    public $message;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($message)
    {
        $this->message=$message;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return <<<'blade'
        <small class="text-red" role="alert">
            <strong>{{ $message }}</strong>
        </small>
        blade;
    }
}
