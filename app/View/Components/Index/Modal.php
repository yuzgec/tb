<?php

namespace App\View\Components\Index;

use Illuminate\View\Component;

class Modal extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function render()
    {
        return view('components.index.modal');
    }
}
