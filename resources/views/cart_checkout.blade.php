@extends('master')

@section('title','Cart Checkout')

@section('content')
<div class="welcome">
    <h2>Cart</h2>
</div>   

<section class="isi-cart col-md-8 mx-auto">
   <table class="table table-borderless">
        @foreach ($cart as $cart)
            <tr >
                {{-- <td>{{$cart->id}}</td> --}}
                <td>  <img src="{{Storage::url($cart->furniture->image)}}" alt="Gambar" style="max-width: 20vw; max-height: 10vh"></td>
                <td>{{$cart->furniture->name}}</td>
                <td>{{$cart->furniture->price}}</td>
                <td>{{$cart->quantity}}</td>
                <td>{{$cart->quantity * $cart->furniture->price}}</td>
                <input type="hidden" name="grandtotal" value="{{$grandtotal += $cart->quantity * $cart->furniture->price}}">
                    
            </tr>
        @endforeach
    </table>

    <p class="total">Total : Rp {{ $grandtotal }}</p>
    
    <div class="form-group row">
        <form action="/paid" method="POST">
            @csrf
            <div class="form-group row">
                <label for="payment" class="col-sm-2 col-form-label">Payment Method</label>
                <div class="form-check form-check-inline col-sm-3 offset-sm-2">
                    <input class="form-check-input" type="radio" name="method" id="credit" value="Credit" required>
                    <label class="form-check-label" for="credit"><b>Credit</b></label>
                </div>
                <div class="form-check form-check-inline col-sm-3">
                    <input class="form-check-input" type="radio" name="method" id="debit" value="Debit" required>
                    <label class="form-check-label" for="debit"><b>Debit</b></label>
                </div>
        
            </div>
            <input type="hidden" name="transaction_id" value="{{$trId->id}}">

            <div class="form-group row nomor-kartu">
                <label for="email" class="col-sm-2 col-form-label">Card Number</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control @error('cardnumber') is-invalid @enderror" name="cardnumber" id="card" required>
                    @error('cardnumber')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>
            </div>
           

            <div class="cart">
                <button type="submit" class="btn btn-primary btn-lg button-checkout">Proceed To Checkout</button>
                {{-- <a class="btn btn-primary" href="#" role="button">Checkout</a> --}}
            </div>
            
        </form>
      </div>
 
   
</section>



@endsection