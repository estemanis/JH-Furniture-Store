@extends('master')

@section('title','Cart')

@section('content')
<div class="welcome">
    <h2>Cart</h2>
</div>   

<section class="isi-cart col-md-8 mx-auto">
    <table class="table table-borderless">
        @foreach ($cart as $cart)
            <tr >
                {{-- <td>{{$cart->id}}</td> --}}
                <td>  <img src="{{Storage::url($cart->image)}}" alt="Gambar" style="max-width: 20vw; max-height: 10vh"></td>
                <td>{{$cart->name}}</td>
                <td>Rp. {{$cart->price}}</td>
                <td>{{$cart->quantity}} item(s)</td>
                <td>Rp. {{$cart->quantity * $cart->furniture->price}}</td>
                <input type="hidden" name="grandtotal" value="{{$grandtotal += $cart->quantity * $cart->furniture->price}}">
                <td > 
                    {{-- <button type="button" class="btn btn-secondary button-min"><input type="hidden" value="{{$cart->quantity = $cart->quantity - 1}}"> -</button>  --}}
                    {{-- <button type="button" class="btn btn-secondary button-plus"><input type="hidden" value="{{$cart->quantity = $cart->quantity + 1}}">+</button></td> --}}
                        <a class="btn btn-primary" href="/minus/{{$cart->id}}" role="button">-</a>
                        <a class="btn btn-primary" href="/plus/{{$cart->id}}" role="button">+</a>
            </tr>
        @endforeach
    </table>

    <p class="total">Total : Rp {{ $grandtotal }}</p>
    
    <div class="cart">
        <a href="{{route('checkout')}}"><button type="button" class="btn btn-primary btn-lg button-checkout">Proceed To Checkout</button></a>
       
    </div>
   
</section>



@endsection