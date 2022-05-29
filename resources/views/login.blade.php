@extends('master')

@section('title','Login')

@section('content')
    <h3 id="login_title">Login</h3>

    {{-- <form action="/login" method="POST" id="login">
        @csrf
        <table>
            <tr>
                <td><label for="email">Email</label></td>
                <td> <input type="email" name="email" id="email"></td>
            </tr>

            <tr>
                <td><label for="password">Password</label></td>
                <td> <input type="password" name="password" id="password"></td>
            </tr>

            <tr>
                <td class="input" colspan="2">
                    <input type="checkbox" name="remember" id="remember">
                    <label for="remember">Remember Me</label>
                </td>
            </tr>

            <tr>
                <td class="input" colspan="2">
                   <input type="submit" value="Login">                    
                </td>
            </tr>
        </table>
    </form> --}}

    <form class="col-sm-3" action="/login" method="POST">
      @csrf
      <div class="form-group row">
        <label for="email" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
          <input type="email" class="form-control" name="email" id="email" value="{{Cookie::get('email')!==null ?Cookie::get('email'):""}}"required>
        </div>
      </div>
      <div class="form-group row">
        <label for="password" class="col-sm-2 col-form-label">Password</label>
        <div class="col-sm-10">
          <input type="password" class="form-control" name="password" id="password" value="{{Cookie::get('password')!==null ?Cookie::get('password'):""}}"required>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-sm-10 offset-sm-4">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="remember" name="remember">
            <label class="form-check-label" for="remember">
              Remember Me
            </label>
          </div>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-sm-10 offset-sm-3">
          <button type="submit" class="btn btn-primary loginbtn" value="Login">Login</button>
        </div>
      </div>
    </form>
@endsection
