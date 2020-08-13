<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Alert extends Component
{
    public $type;
    public $message;
    public $title;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($type,$message)
    {
        $this->type=$type;
        $this->message=$message;
        switch($type)
        {
            case 'danger':
                $this->title='failed';
            break;
            default:
                $this->title=$type;
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return <<<'blade'
        <div role="alert" class="alert alert-{{ $type }}">
            <strong class="alert-heading">{{ strtoupper($title) }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span class aria-hidden="true">×</span>
            </button>
            <span>. {{ $message }}</span>
        </div>
        blade;
    }
}
