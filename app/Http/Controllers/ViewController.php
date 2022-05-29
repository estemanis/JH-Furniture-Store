<?php

namespace App\Http\Controllers;

use App\Models\Furniture;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    //
    public function view(){
        $furniture = Furniture::all();

        return view('view_furniture', compact('furniture'));
    }
}
