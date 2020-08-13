<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Form extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $action;
    public $method;
    public $id;
    public function __construct($action,$method,$id)
    {
        $this->action=$action;
        $this->method=$method;
        $this->id=$id;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return <<<'blade'
        <Form id="{{ $id }}" method="post" action="{{ $action }}">
            @csrf
            @method($method)
            {{ $slot }}
        </Form>
blade;
    }
}
