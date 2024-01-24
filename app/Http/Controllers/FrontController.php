<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $data = Product::getGreateThan()->latest('price')->paginate(100);
        return view('welcome');
    }

    public function getData($param)
    {
        return view('website', compact('param'));
    }

    public function check_auth()
    {
        return 'This Check';
    }
}
