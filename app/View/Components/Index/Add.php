<?php

namespace App\View\Components\Index;

use Illuminate\View\Component;

class Add extends Component
{

    public $title;

    public function __construct($title)
    {
        $this->title =  $title;
    }

    public function render()
    {
        return view('components.index.add');
    }
}
