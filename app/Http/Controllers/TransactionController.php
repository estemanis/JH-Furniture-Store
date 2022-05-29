<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function viewTransaction(){
        $trId = Transaction::orderby('deleted_at', 'desc')
        ->where('account_id', '=', Auth::user()->id)->onlyTrashed()->get();
        // dd($trId);

        if(Auth::user()->role === 'Admin'){
            $transaction = Transaction::onlyTrashed()->get();
            $cart = Cart::join('transactions', 'transactions.id', '=', 'carts.transaction_id')->join('furnitures', 'furnitures.id', '=', 'carts.furniture_id')
            ->select('transactions.id', 'furnitures.name', 'furnitures.price', 'carts.quantity')->onlyTrashed()->get();
        }else{
            $transaction = Transaction::where('account_id', '=', Auth::user()->id)->onlyTrashed()->get();
            $cart = Cart::join('transactions', 'transactions.id', '=', 'carts.transaction_id')->join('furnitures', 'furnitures.id', '=', 'carts.furniture_id')->where('account_id', '=', Auth::user()->id)
            ->select('transactions.id', 'furnitures.name', 'furnitures.price', 'carts.quantity')->onlyTrashed()->get();
        }
        $grandtotal = 0;
        
        
        // dd($cart);

        return view('transaction_history', compact('transaction', 'grandtotal', 'cart'));
    }

}
