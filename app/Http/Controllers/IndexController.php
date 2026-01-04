<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use App\Models\Client;
use App\Models\Spanduk;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){

        $spanduk = Spanduk::all();
        $catalogue = Catalog::take(16)->get();
        $customer = Client::all();

        return view('components.pages.Home',[
            'title'  => 'Beranda',
            'spanduk' => $spanduk,
            'catalogue' => $catalogue,
            'customer' => $customer
        ]);
    }
}
