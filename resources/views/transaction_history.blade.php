@extends('master')

@section('title','Transaction History')

@section('content')

<div class="welcome">
    <h2>Transaction History</h2>
</div>   

@if (Auth::user()->role === 'Admin')
  <section>
    @foreach ($transaction as $data)
    <input type="hidden" name="grandtotal" value="{{$grandtotal =  0}}">
      <div class="bungkus-transaksi mx-5 tabel-history" >

          <table class="data_transaksi">
              <tr>
                  <td>Transaction ID : {{$data->id}} </td>
              
              </tr>
      
              <tr>
                  <td>Transaction Date : {{$data->created_at}}</td>
        
              </tr>
      
              <tr>
                  <td>Method : {{$data->method}}</td>
                  
              </tr>
              <tr></tr>
      
              <tr>
                  <td>Card Number : {{$data->cardnumber}}</td>
              </tr>
      
              <tr>
                  <td>User's Name : {{$data->account->fullname}}</td>
              </tr>
     
              <tr>

              </tr>
          </table>
          <table class="table table-bordered isi-transaksi">
              <thead>
                <tr>
                  <th scope="col">Furniture's Name</th>
                  <th scope="col">Furniture's Price</th>
                  <th scope="col">Quantity</th>
                  <th scope="col">Total Price For Each Furniture</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($cart as $d)
                    @if ($d->id == $data->id)
                      <tr>
                        <td>{{$d->name}}</td>
                        <td>Rp. {{$d->price}}</td>
                        <td>{{$d->quantity}}</td>
                        <td>Rp. {{$d->quantity * $d->price}}</td>
                        <input type="hidden" name="grandtotal" value="{{$grandtotal += $d->quantity *$d->price}}">
                      </tr>
                    
                    @endif
                @endforeach
                <tr>
                  <td colspan="3">Total Price</td>
                  <td>Rp. {{ $grandtotal }}</td>
                </tr>
              </tbody>
            </table>

      </div>
    @endforeach

  </section>

@else
    <section>
      @foreach ($transaction as $data)
      <input type="hidden" name="grandtotal" value="{{$grandtotal =  0}}">
        <div class="bungkus-transaksi mx-5 tabel-history" >

            <table class="data_transaksi">
                <tr>
                    <td>Transaction ID : {{$data->id}} </td>
                
                </tr>
        
                <tr>
                    <td>Transaction Date : {{$data->created_at}}</td>
          
                </tr>
        
                <tr>
                    <td>Method : {{$data->method}}</td>
                    
                </tr>
                <tr></tr>
        
                <tr>
                    <td>Card Number : {{$data->cardnumber}}</td>
                </tr>
        
                <tr>

                </tr>
            </table>
            <table class="table table-bordered isi-transaksi">
                <thead>
                  <tr>
                    <th scope="col">Furniture's Name</th>
                    <th scope="col">Furniture's Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Total Price For Each Furniture</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($cart as $d)
                  @if ($d->id == $data->id)
                      <tr>
                        <td>{{$d->name}}</td>
                        <td>Rp. {{$d->price}}</td>
                        <td>{{$d->quantity}}</td>
                        <td>Rp. {{$d->quantity * $d->price}}</td>
                        <input type="hidden" name="grandtotal" value="{{$grandtotal += $d->quantity *$d->price}}">
                      </tr>
                      
                  @endif
                  @endforeach
                  <tr>
                    <td colspan="3">Total Price</td>
                    <td>Rp. {{ $grandtotal }}</td>
                  </tr>
                </tbody>
              </table>

        </div>
      @endforeach

    </section>
  
@endif


@endsection