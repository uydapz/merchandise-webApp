<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ButtonAction extends Component
{
    public $read;
    public $edit;
    public $delete;
    public $print;
    public $modal;

    public function __construct($read = null, $edit = null, $delete = null, $modal = null,$print = null){
        $this->read = $read ?? "";
        $this->print = $print ?? "";
        $this->edit = $edit ?? "";
        $this->delete = $delete ?? "";
        $this->modal = $modal ?? "";
    }
    
    public function render(): View|Closure|string
    {
        return view('components.atoms.ButtonAction');
    }
}
