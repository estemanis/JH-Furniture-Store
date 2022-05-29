<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
        
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/user.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('css/login.css') }}" rel="stylesheet"> --}}
    <title>@yield('title')</title>
</head>
<body>
    @if(!Auth::check())
        
        <nav class="navbar navbar-expand-lg">
        
            <div class="collapse navbar-collapse" id="navbarNav">
            <h3>JH Furniture</h3>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('home')}}">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="{{route('view')}}">View</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="{{route('indexLogin')}}">Login</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="{{route('indexRegister')}}">Register</a>
                </li>
            </ul>
            </div>

        </nav>

    @elseif(Auth::user()->role === 'Admin')    
        <nav class="navbar navbar-expand-lg">
            
        <h3>JH Furniture</h3>
            <div class="navbar-nav ml-auto" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('home')}}">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="{{route('view')}}">View</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="{{route('profile')}}">Profile</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="{{route('addFurniture')}}">Add Furniture</a>
                </li>
            </ul>
            </div>

        </nav>

    @else    
        <nav class="navbar navbar-expand-lg">
            
            <h3>JH Furniture</h3>
            <div class="navbar-nav ml-auto" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('home')}}">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="{{route('view')}}">View</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="{{route('profile')}}">Profile</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="{{route('cart')}}">Cart</a>
                </li>
            </ul>
            </div>

        </nav>

    @endif
    
    
    @yield('content')

    <footer>
      
      <section class="footer-dalem">
        <div id="bag1">
           
            <div class="judul"><h2>JH Furniture</h2></div>
            
            <div class="isi">
                <p>JH Furniture is a biggest Furniture<br>Shop in Indonesia,<br>with more than 250 branches.<br>JH Furniture is always innovating and<br>providing the best service<br>for Indonesian culture.</p>
            </div>
            
            <div id="copyright">
                <p>&copy;2021, JH Furniture</p>
            </div>
            
        </div>
        <div id="bag2">
        <div class="judul"><h2>Information</h2></div>
        
        <div class="isi">
            <p>Terms</p>
            <p>Privacy</p>
            <p>Affliate</p>
            <p>Career</p>
            <p>FAQ</p>
        </div>
        
        </div>
        <div id="bag3">
            <div class="judul"><h2>Account</h2></div>
            
            <div class="isi">
                <p>My Account</p>
                <p>View Dealer</p>
                <p>My Wishlist</p>
                <p>Order Status</p>
                <p>Track My Order</p>
            </div>
            
        </div>
        <div id="bag4">
            <div class="judul">
                <h2>Contact</h2>
            </div>
            
            <div class="isi">
           
            <p>Phone  : +62 856-8152-1123</p>
            <p>Email  : CS_@JhFurniture.net</p>
            <p>Address: 123 Griya Kencana</p>
      
            </div>

            <div id="logo">
                <a href="https://www.facebook.com/" class="fa fa-facebook" target="_blank"></a>
                <a href="https://www.instagram.com/" class="fa fa-instagram" target="_blank"></a>
                <a href="https://twitter.com/" class="fa fa-twitter" target="_blank"></a>
                <a href="https://www.linkedin.com/feed/" class="fa fa-linkedin" target="_blank"></a>
            </div>
        </div>
    </section>
   
    </footer>

  </body>
</html>