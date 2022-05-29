@extends('master')

@section('title','Register')

@section('content')
<h3 id="register_title">Register</h3>

<form class="col-sm-4" action="/register" method="POST">
    @csrf
    <div class="form-group row">
      <label for="fullname" class="col-sm-2 col-form-label">Full Name</label>
      <div class="col-sm-10">
        <input type="text" class="form-control @error('fullname') is-invalid @enderror" name="fullname" id="fullname" required>
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
          <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" required>
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
        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" required>
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
          <textarea class="form-control @error('address') is-invalid @enderror" name="address" id="address" cols="60" rows="2" required></textarea>
          @error('address')
            <div class="invalid-feedback">
              {{$message}}
            </div>
        @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="gender" class="col-sm-2 col-form-label">Gender</label>
        <div class="form-check form-check-inline col-sm-3 offset-sm-2">
            <input class="form-check-input" type="radio" name="gender" id="male" value="Male" required>
            <label class="form-check-label" for="male"><b>Male</b></label>
        </div>
        <div class="form-check form-check-inline col-sm-3">
            <input class="form-check-input" type="radio" name="gender" id="female" value="Female" required>
            <label class="form-check-label" for="female"><b>Female</b></label>
        </div>
    </div>
    <div class="form-group row">
      <div class="col-sm-10 offset-sm-4">
        <button type="submit" class="btn btn-primary registerbtn" value="Register">Register</button>
      </div>
    </div>
  </form>
@endsection