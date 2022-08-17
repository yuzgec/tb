<?php

namespace App\View\Components\Form;
use Illuminate\View\Component;

class InputText extends Component
{
    public $label;
    public $name;
    public $class;
    public $column;

    public function __construct($label, $name, $class = "form-control",$column=3)
    {
        $this->label = $label;
        $this->name = $name;
        $this->class = $class;
        $this->column = $column;
    }

    public function render()
    {
        return view('components.form.input-text');
    }
}
