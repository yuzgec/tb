<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class TextArea extends Component
{
    public $label;
    public $name;
    public $class;
    public $ck;

    public function __construct($label, $name, $class = "form-control", $ck = 'aciklama')
    {
        $this->label = $label;
        $this->name = $name;
        $this->class = $class;
        $this->ck = $ck;
    }

    public function render()
    {
        return view('components.form.text-area');
    }
}
