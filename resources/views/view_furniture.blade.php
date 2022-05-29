@extends('master')

@section('title','View')

@section('content')
    @if(!Auth::check())
            <div class="welcome">
                <h2>View Furniture</h2>
            </div>
            <form class="form-inline my-2 my-0 search-bar">
                <input class="form-control mr-sm-2 w-25" type="search" placeholder="Search by furniture's name" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-2 button-search" type="submit">Search</button>
              </form>
            <section>
                <div class="card-deck mx-5">

                    @foreach ($furniture as $furniture)
                    <div class="col-lg-3 col-md-3 col-sm-3 mb-3">
                        <div class="card view-img">
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
                    </div>
                    
                    @endforeach

                </div>
            </section>

        @elseif(Auth::user()->role === 'Admin')    
            @auth
                <div class="welcome">
                    <h2>View Furniture</h2>
                </div>
                <form class="form-inline my-2 my-0 search-bar">
                    <input class="form-control mr-sm-2 w-25" type="search" placeholder="Search by furniture's name" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-2 button-search" type="submit">Search</button>
                  </form>
                <section>
                    <div class="card-deck mx-5">
            
                        @foreach ($furniture as $furniture)
                        <div class="col-lg-3 col-md-3 col-sm-3 mb-3">
                            <div class="card view-img">
                                <a href="detail-furniture/{{$furniture->id}}"> 
                            <img src="{{ Storage::url($furniture->image) }}" class="card-img-top" alt="...">
                                </a>
                            <div class="card-body">
                                <h5 class="card-title information">{{ $furniture->name }}</h5>
                                <p class="card-text information">Rp. {{ $furniture->price }}</p>
                                {{-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> --}}
                            </div>
                            <div class="card-footer">
                                <a href="update-furniture/{{$furniture->id}}"><button type="button" class="btn btn-success btn-update">Update</button></a>
                                <a href="/delete-furniture/{{$furniture->id}}"><button type="button" class="btn btn-danger btn-delete">Delete</button></a>
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

                <form class="form-inline my-2 my-0 search-bar">
                    <input class="form-control mr-sm-2 w-25" type="search" placeholder="Search by furniture's name" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-2 button-search" type="submit">Search</button>
                  </form>

                <section>
                    <div class="card-deck mx-5">
            
                        @foreach ($furniture as $furniture)
                        <div class="col-lg-3 col-md-3 col-sm-3 mb-3">
                            <div class="card view-img">
                                <a href="detail-furniture/{{$furniture->id}}"> 
                            <img src="{{ Storage::url($furniture->image) }}" class="card-img-top" alt="...">
                                </a>
                            <div class="card-body">
                                <h5 class="card-title information">{{ $furniture->name }}</h5>
                                <p class="card-text information">Rp. {{ $furniture->price }}</p>
                                {{-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> --}}
                            </div>
                            <div class="card-footer">
                                {{-- <button type="submit" class="btnitem-1" >Add to Cart</button> --}}
                                <a class="btn btn-primary" href="/cart/{{$furniture->id}}" role="button">Add to Cart</a>
                            </div>
                            
                            </div>
                        </div>
                        
                
                    @endforeach
            
                    </div>
                </section>
            @endauth
    @endif

@endsection