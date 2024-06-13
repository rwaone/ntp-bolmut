<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FilterTable extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $properties;
    public $query;
    public function __construct($properties,$query)
    {
        $this->properties = $properties;
        $this->query = $query;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.filter-table');
    }
}
