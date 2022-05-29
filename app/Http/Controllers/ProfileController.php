<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function profile(){
        return view('profile');
    }

    public function updateProfile(){
        return view('update_profile');
    }

    public function edit(Request $request){
        if(Auth::user()->role === 'Admin'){
            $validateData = $request->validate([
                'fullname'  =>  'required | max:15',//blom unique
                'email'     =>  'required | email',//blom unique
                'password'  =>  'required | min:5 | max:20', 
            ]);
        }
        else{
            $validateData = $request->validate([
                'fullname'  =>  'required | max:15', //blom unique
                'email'     =>  'required | email',//blom unique
                'password'  =>  'required | min:5 | max:20', 
                'address'   =>  'required | min:5 | max: 95',
            ]);
        }
        
        $validateData['id'] = auth()->user()->id;

        // dump($validateData);

        $validateData['password'] = bcrypt($validateData['password']);

        // echo $validateData['password'];

        Account::where('id', $validateData['id'])->update($validateData); 
        if(Auth::user()->role === 'Admin'){
            return redirect('/admin/profile');
        }
        else{
            return redirect('/user/profile');
        }
    }

}
