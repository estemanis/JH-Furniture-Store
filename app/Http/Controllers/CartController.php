<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Furniture;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    //
    public function cart(){
        $notNull = Transaction::where('transactions.account_id', '=', Auth::user()->id)->get();
        // dd($notNull->isEmpty());
        
        if($notNull->isEmpty()){
            Transaction::create([
                'account_id' => Auth::user()->id,
                'method' => 'none',
                'cardnumber' => 'none',
            ]);
        }

        $trId = Transaction::orderby('created_at', 'desc')->first();
        $cart = Cart::join('transactions', 'carts.transaction_id', '=', 'transactions.id')
        ->join('furnitures', 'furnitures.id', '=', 'carts.furniture_id')
        ->where('account_id', '=', Auth::user()->id)
        ->where('carts.transaction_id', '=', $trId->id)
        ->select('carts.id', 'carts.transaction_id', 'carts.furniture_id', 'furnitures.image', 'furnitures.price', 'furnitures.name', 'carts.quantity')->get();



        $grandtotal = 0;
        return view('cart', compact('cart', 'grandtotal'));
    }

    public function checkout(){
        $cart = Cart::join('transactions', 'carts.transaction_id', '=', 'transactions.id')
        ->join('furnitures', 'furnitures.id', '=', 'carts.furniture_id')
        ->where('account_id', '=', Auth::user()->id)->get();

        $trId = Transaction::orderby('created_at', 'desc')->first();

        $grandtotal = 0;

        return view('cart_checkout', compact('cart', 'grandtotal', 'trId'));
    }

    public function pay(Request $request){
        $trId = Transaction::orderby('created_at', 'desc')->first();
        $data = Cart::join('transactions', 'carts.transaction_id', '=', 'transactions.id')
        ->where('carts.transaction_id', '=', $request->transaction_id)
        ->where('account_id', '=', Auth::user()->id)->get('carts.id');
    
        $validateData = $request->validate([
            'method'         =>  'required',
            'cardnumber'     =>  'required | digits:16',
        ]);

        Transaction::where('id', '=', $trId->id)->update([
            'method'        => $validateData['method'],
            'cardnumber'    => 'xxxx-xxxx-xxxx-'.substr($validateData['cardnumber'], -4),
        ]);

        foreach($data as $data){
            Cart::where('Carts.id', '=', $data->id)->delete();
        }
        Transaction::where('id', '=', $request->transaction_id)->delete();
        // dd($request->id);
        return redirect('/home');
    }

    public function addtoCart($id){
        $data = Furniture::where('id', '=', $id)->first();
        // dd($data);
       
        $notNull = Transaction::where('transactions.account_id', '=', Auth::user()->id)->get();
        // dd($notNull->isEmpty());
        
        if($notNull->isEmpty()){
            Transaction::create([
                'account_id' => Auth::user()->id,
                'method' => 'none',
                'cardnumber' => 'none',
            ]);
        }

        $trId = Transaction::orderby('created_at', 'desc')->first();

        $cart = Cart::create([
            'transaction_id' => $trId->id,
            'furniture_id' => $data['id'],
            'quantity' => 1,
        ]);

        return redirect('/home')->with('success', 'Product Successfully Added');
    }

    public function minus($id){
        $qty = Cart::where('carts.id', '=', $id)->first();

        if( $qty->quantity - 1 == 0){
            Cart::where('id', '=', $id)->delete();
        }
       
        else{
            Cart::where('id', '=', $id)->decrement('quantity', 1);
        }
        
        return redirect('/cart');
    }

    public function plus($id){
        Cart::where('id', '=', $id)->increment('quantity', 1);
        
        return redirect('/cart');
    }
}
