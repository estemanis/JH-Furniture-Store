@extends('master')

@section('title','Furniture Detail')

@section('content')


@if(!Auth::check())

@foreach ($furniture as $furniture)
    <div class="welcome">
        <h2>{{$furniture->name}}</h2>
    </div>
    <section>
        <div class="isi-tengah-update">
            <div class="gambar-kiri detail-furniture-img"><img src="{{ Storage::url($furniture->image) }}" alt="...">
                </div>
            <div class="bagian-kanan">
                <table class="table table-borderless detail">
                    <tr>
                        <td>Name :</td>
                        <td class="detail-info">{{$furniture->name}}</td>
                    </tr>

                    <tr>
                        <td>Price :</td>
                        <td class="detail-info">Rp. {{$furniture->price}}</td>
                    </tr>

                    <tr>
                        <td>Type :</td>
                        <td class="detail-info">{{$furniture->type}}</td>
                    </tr>
                    
                    <tr>
                        <td>Color :</td>
                        <td class="detail-info">{{$furniture->color}}</td>
                    </tr>
                </table>
            </div>
            
        </div>

        <div class="isi-bawah-update">
            <div>
                <a href="/view">
                    <button type="button" class="btn btn-primary btn-lg mr-4 previous-btn">Previous</button>
                </a> 
               
            </div>
            
            <div>
                <a href="{{route('login')}}"><button type="button" class="btn btn-primary btn-lg ml-4 cart-btn">Add To Cart</button></a>
            </div>
        </div>
    
    </section>
@endforeach



@elseif(Auth::user()->role === 'Admin')    
    @auth
    @foreach ($furniture as $furniture)
   
        <div class="welcome">
            <h2>{{$furniture->name}}</h2>
        </div>
        <section>
            <div class="isi-tengah-update">
                <div class="gambar-kiri detail-furniture-img"><img src="{{ Storage::url($furniture->image) }}" alt="...">
                    </div>
                <div class="bagian-kanan">
                    <table class="table table-borderless detail">
                        <tr>
                            <td>Name :</td>
                            <td class="detail-info">{{$furniture->name}}</td>
                        </tr>

                        <tr>
                            <td>Price :</td>
                            <td class="detail-info">Rp. {{$furniture->price}}</td>
                        </tr>

                        <tr>
                            <td>Type :</td>
                            <td class="detail-info">{{$furniture->type}}</td>
                        </tr>
                        
                        <tr>
                            <td>Color :</td>
                            <td class="detail-info">{{$furniture->color}}</td>
                        </tr>
                    </table>
                </div>
                
            </div>

            <div class="isi-bawah-update">
                <div>
                    <a href="/view"><button type="button" class="btn btn-primary btn-lg mr-4 previous-btn">Previous</button></a>
                </div>
                
                <div>
                    <a href="/update-furniture/{{$furniture->id}}"><button type="button" class="btn btn-primary btn-lg update-btn">Update</button></a>
                </div>
                
                <div>
                    <a href="/delete-furniture/{{$furniture->id}}"><button type="button" class="btn btn-primary btn-lg ml-4 delete-btn">Delete</button></a>
                </div>
            </div>

        </section>
    @endforeach
    @endauth

@else    
    @auth
    @foreach ($furniture as $furniture)
        <div class="welcome">
            <h2>{{$furniture->name}}</h2>
        </div>
        <section>
        <div class="isi-tengah-update">
            <div class="gambar-kiri detail-furniture-img"><img src="{{ Storage::url($furniture->image) }}" alt="...">
                </div>
            <div class="bagian-kanan">
                <table class="table table-borderless detail">
                    <tr>
                        <td>Name :</td>
                        <td class="detail-info">{{$furniture->name}}</td>
                    </tr>

                    <tr>
                        <td>Price :</td>
                        <td class="detail-info">Rp. {{$furniture->price}}</td>
                    </tr>

                    <tr>
                        <td>Type :</td>
                        <td class="detail-info">{{$furniture->type}}</td>
                    </tr>
                    
                    <tr>
                        <td>Color :</td>
                        <td class="detail-info">{{$furniture->color}}</td>
                    </tr>
                </table>
            </div>
            
        </div>

        <div class="isi-bawah-update">
            <div>
                <a href="/view">
                    <button type="button" class="btn btn-primary btn-lg mr-4 previous-btn">Previous</button>
                </a>
                
            </div>
            
            <div>
                {{-- <button type="button" class="btn btn-primary btn-lg ml-4 cart-btn">Add To Cart</button> --}}
                <a class="btn btn-primary btn-lg ml-4 cart-btn" href="/cart/{{$furniture->id}}" role="button">Add to Cart</a>
            </div>
        </div>

        </section>
    @endforeach  
    @endauth
@endif

@endsection