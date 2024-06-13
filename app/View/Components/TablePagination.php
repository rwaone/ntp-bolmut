<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TablePagination extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $paginatedData;
    public function __construct($paginatedData)
    {
        $this->paginatedData = $paginatedData;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.table-pagination');
    }
}
