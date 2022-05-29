@extends('master')

@section('title','Home')

@section('content')
@if(!Auth::check())
<div class="welcome">
    <h2>Welcome to JH Furniture</h2>
</div>

<section>
    <div class="card-deck mx-5">

        @foreach ($furniture as $furniture)
        
            <div class="card home-img">
                <a href="detail-furniture/{{$furniture->id}}">
                    <img src="{{ Storage::url($furniture->image) }}" class="card-img-top" alt="...">
                </a>
                <div class="card-body">
                    <h5 class="card-title information">{{ $furniture->name }}</h5>
                    <p class="card-text information">Rp. {{ $furniture->price }}</p>
                    {{-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> --}}
                </div>
                <div class="card-footer">
                    <a href="{{route('login')}}"> <button type="submit" class="btnitem-1">Add to Cart</button></a>
                </div>
    
            </div>
      
        

        @endforeach

    </div>
</section>

@elseif(Auth::user()->role === 'Admin')
@auth
<div class="welcome">
    <h2>Welcome, Admin</h2>
    <h2>to JH Furniture</h2>
</div>

<section>
    <div class="card-deck mx-5">

        @foreach ($furniture as $furniture)
        
            <div class="card home-img">
                <a href="{{ route('detailFurniture', $furniture) }}">
                    <img src="{{ Storage::url($furniture->image) }}" class="card-img-top" alt="...">
                </a>
                <div class="card-body">
                    <h5 class="card-title information">{{ $furniture->name }}</h5>
                    <p class="card-text information">Rp. {{ $furniture->price }}</p>
                    {{-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> --}}
                </div>
                <div class="card-footer">
                    <a href="/update-furniture/{{$furniture->id}}"><button type="button"
                            class="btn btn-success btn-update">Update</button></a>
                    {{-- <a href="/delete-furniture/{{$furniture->id}}"><button type="button"
                        class="btn btn-danger btn-delete">Delete</button></a> --}}
                    <div class="col-3">
                        <form action="{{url('delete-furniture/'.$furniture->id)}}" method="POST"> @csrf <button
                                type="submit" class="btn btn-danger btn-delete" style="border: none">Delete </button> </form>
                    </div>
                </div>
    
            </div>
       
        

        @endforeach

    </div>
</section>
@endauth

@else
@auth
<div class="welcome">
    <h2>Welcome, {{Auth::user()->fullname}}</h2>
    <h2>to JH Furniture</h2>
</div>

<section>
    <div class="card-deck mx-5">

        @foreach ($furniture as $furniture)

      
            <div class="card home-img ">
                <a href="detail-furniture/{{$furniture->id}}">
                    <img src="{{ Storage::url($furniture->image) }}" class="card-img-top" alt="...">
                </a>
                <div class="card-body">
                    <h5 class="card-title information">{{ $furniture->name }}</h5>
                    <p class="card-text information">Rp. {{ $furniture->price }}</p>
                    {{-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> --}}
                </div>
                <div class="card-footer">
                    {{-- <a href="/cart/{{$furniture->id}}"><button type="submit" class="btnitem-1" value="{{$furniture->id}}" >Add to Cart</button></a> --}}
                    <a class="btn btn-primary" href="/cart/{{$furniture->id}}" role="button">Add to Cart</a>
                    
                </div>
                
            </div>
       
       
        
        @endforeach
        
    </div>
    @if (session()->has('success'))
       <p style="text-align: center; font-size:2vw"> {{session()->get('success')}}</p>
    @endif
</section>
@endauth
@endif

@endsection
