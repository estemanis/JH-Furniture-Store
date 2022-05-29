<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Furniture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;

class GuestController extends Controller
{
    public function guest(){
        $furniture = Furniture::all();
        return view('home', compact('furniture'));
    }
   
    public function logout(){
        if(Auth::check()){
            Auth::logout();
            return redirect('/login');
        }
    }

    public function login(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        

        if($request->remember){
            Cookie::queue('email', $request->email, 60);
            Cookie::queue('password', $request->password, 60);
        }

        if(Auth::attempt($credentials)){
            // dump($credentials);
            // return 'login berhasil';
            
            if(Auth::user()->role === 'Admin'){
                return redirect('/home');
            }
            else if(Auth::user()->role === 'Member'){
                return redirect('/home');
            }
        }
        // dump($credentials);
        return redirect('/login');
        // return 'gagal';
    }

    public function register(Request $request)
    {
        $validateData = $request->validate([
            'fullname'  =>  'required | unique:accounts',
            'email'     =>  'required | email | unique:accounts',
            'password'  =>  'required | min:5 | max:20', 
            'address'   =>  'required | min:5 | max: 95',
            'gender'    =>  'required',
        ]);
        
        $validateData['password'] = bcrypt($validateData['password']);

        Account::create($validateData);

        return redirect('/login');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexLogin()
    {
        return view('login');
    }

    public function indexRegister()
    {
        return view('register');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
