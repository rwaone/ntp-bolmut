<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SelectSearch extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

     public $datas;
     public $name;
     public $uniqueId;
     public $dependentComponentId;
     public $dependentName;
    public function __construct($name,$datas,$uniqueId,$dependentComponentId='',$dependentName='')
    {
        $this->name = $name;
        $this->datas = $datas;
        $this->uniqueId = $uniqueId;
        $this->dependentComponentId = $dependentComponentId;
        $this->dependentName = $dependentName;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.select-search');
    }
}
