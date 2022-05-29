<?php

namespace App\Http\Controllers;

use App\Models\Furniture;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function home(){
        $count = Furniture::count();

        if($count >= 4){
            $furniture = Furniture::all()->Random(4);
        }else{
            $furniture = Furniture::all()->Random($count);
        }

        return view('home', compact('furniture'));
    }
}
