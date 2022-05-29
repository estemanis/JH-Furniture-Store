@extends('master')

@section('title','Update Profile')

@section('content')
    @if (Auth::user()->role === 'Admin')
        <h3 class="update_title">Update Profile</h3>

        <form class="col-sm-4" action="/update-profile" method="POST">
            @csrf
            <div class="form-group row">
            <label for="fullname" class="col-sm-2 col-form-label">Full Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control @error('fullname') is-invalid @enderror" name="fullname" id="fullname" required value="{{Auth::user()->fullname}}">
                @error('fullname')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" required value="{{Auth::user()->email}}">
                @error('email')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
                </div>
            </div>
            <div class="form-group row">
            <label for="password" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
                <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter your password" name="password" id="password" required>
                @error('password')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
            </div>
            <div class="form-group row">
            <div class="col-sm-10 offset-sm-4">
                <button type="submit" class="btn btn-primary updatebtn" value="Update">Update</button>
            </div>
            </div>
        </form>
    @elseif(Auth::user()->role === 'Member')
        <h3 class="update_title">Update Profile</h3>

        <form class="col-sm-4" action="/update-profile" method="POST">
            @csrf
            <div class="form-group row">
            <label for="fullname" class="col-sm-2 col-form-label">Full Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control @error('fullname') is-invalid @enderror" name="fullname" id="fullname" required value="{{Auth::user()->fullname}}">
                @error('fullname')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" required value="{{Auth::user()->email}}">
                @error('email')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
                </div>
            </div>
            <div class="form-group row">
            <label for="password" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
                <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter your password" name="password" id="password" required>
                @error('password')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
            </div>
            <div class="form-group row">
            <label for="address" class="col-sm-2 col-form-label">Address</label>
            <div class="col-sm-10">
                {{-- <input type="text" class="form-control" name="address" id="address" required> --}}
                <textarea class="form-control @error('address') is-invalid @enderror" name="address" id="address" cols="60" rows="2" required >{{Auth::user()->address}}</textarea>
                @error('address')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
            </div>
            </div>
            <div class="form-group row">
            <div class="col-sm-10 offset-sm-4">
                <button type="submit" class="btn btn-primary updatebtn" value="Update">Update</button>
            </div>
            </div>
        </form>
    @endif

@endsection