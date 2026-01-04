<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DataTables extends Component
{   
    public $jenis;
    public $tabel;
    public $modal;

    public function __construct($jenis = null, $tabel = null, $modal = null){
        $this->jenis = $jenis ?? "";
        $this->tabel = $tabel ?? "";
        $this->modal = $modal ?? "";
    }
    
    public function render(): View|Closure|string
    {
        return view('components.organisms.DataTables');
    }
}
