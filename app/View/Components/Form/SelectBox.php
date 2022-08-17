<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class SelectBox extends Component
{

    public $label;
    public $name;
    public $class;
    public $list;
    public $selected;
    public $placeholder;
    public $multiple;

    public function __construct($label, $name, $list, $class = "form-control",$selected = null, $placeholder = null, $multiple = null)
    {
        $this->label = $label;
        $this->name = $name;
        $this->list = $list;
        $this->class = $class;
        $this->selected = $selected;
        $this->placeholder = $placeholder;
        $this->multiple = $multiple;
    }

    public function render()
    {
        return view('components.form.select-box');
    }
}
