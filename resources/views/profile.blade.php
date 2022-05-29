@extends('master')

@section('title','Profile')

@section('content')
    @if (Auth::user()->role === 'Admin')
        <div class="welcome">
            <h2>Admin's Profile</h2>
        </div>         

        <table class="profile">
            <tr>
                <td>Full Name</td>
                <td>{{Auth::user()->fullname}}</td>
            </tr>

            <tr>
                <td>Email</td>
                <td>{{Auth::user()->email}}</td>
            </tr>

            <tr>
                <td>Role</td>
                <td>{{Auth::user()->role}}</td>
            </tr>
        </table>

        <div class="btn_group">
            <form action="/logout" method="POST" class="logout">
                @csrf
                <a href="{{route('logout')}}"><button class="btn btn-primary profile-btn" type="submit" value="Logout">Logout</button></a>
            </form>
            <a href="{{route('viewTransaction')}}"><button class="btn btn-primary profile-btn">View Transaction History</button></a>
            <a href="{{route('updateProfile')}}"><button class="btn btn-primary profile-btn">Update Profile</button></a>
        </div>
    @elseif(Auth::user()->role === 'Member')
        <div class="welcome">
            <h2>{{Auth::user()->fullname}}'s Profile</h2>
        </div>         

        <table class="profile">
            <tr>
                <td>Full Name</td>
                <td>{{Auth::user()->fullname}}</td>
            </tr>

            <tr>
                <td>Email</td>
                <td>{{Auth::user()->email}}</td>
            </tr>

            <tr>
                <td>Address</td>
                <td class="user_address" rowspan="2">{{Auth::user()->address}}</td>
            </tr>
            <tr></tr>

            <tr>
                <td>Gender</td>
                <td>{{Auth::user()->gender}}</td>
            </tr>

            <tr>
                <td>Role</td>
                <td>{{Auth::user()->role}}</td>
            </tr>

            <tr>
                
            </tr>
        </table>

        <div class="btn_group">
            <form action="/logout" method="POST" class="logout">
                @csrf
                <a href="{{route('logout')}}"><button class="btn btn-primary profile-btn" type="submit" value="Logout">Logout</button></a>
            </form>
            <a href="{{route('viewTransaction')}}"><button class="btn btn-primary profile-btn">View Transaction History</button></a>
            <a href="{{route('updateProfile')}}"><button class="btn btn-primary profile-btn">Update Profile</button></a>
        </div>
    @endif 

@endsection