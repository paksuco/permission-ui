<?php

namespace Paksuco\Permission\Components;

use Livewire\Component;

class ToggleButton extends Component
{

    public $state;

    public $event;

    public $arguments;

    public function mount($event, $arguments = [], $initialState)
    {
        $this->event = $event;
        $this->arguments = $arguments;
        $this->state = $initialState;
    }

    public function runCallback()
    {
        $this->emitUp($this->event, ...$this->arguments);
        $this->emit("refreshMappings");
    }

    public function render()
    {
        return view("permission-ui::components.partials.toggle-button");
    }
}
