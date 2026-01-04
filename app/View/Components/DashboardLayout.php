<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DashboardLayout extends Component
{
    public $title;
    public $induk;

    public function __construct($title = null, $induk = null){
        $this->title = $title ?? "";
        $this->induk = $induk ?? "";
    }
    
    public function render(): View|Closure|string
    {
        return view('components.templates.DashboardLayout');
    }
}
