<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js">
    <!-- Styles  -->

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/4.3.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js">

    </script>
    <script>
    $(document).ready( function () {
        $('table').DataTable();
    } );
    </script>
    <style media="screen">
    .sidebar-container {
    position: fixed;
    width: 220px;
    height: 100%;
    left: 0;
    overflow-x: hidden;
    overflow-y: auto;
    background: #1a1a1a;
    color: #fff;
  }

  .content-container {
    padding-top: 20px;
  }

  .sidebar-logo {
    padding: 10px 15px 10px 30px;
    font-size: 20px;
    background-color: #2574A9;
  }

  .sidebar-navigation {
    padding: 0;
    margin: 0;
    list-style-type: none;
    position: relative;
  }

  .sidebar-navigation li {
    background-color: transparent;
    position: relative;
    display: inline-block;
    width: 100%;
    line-height: 20px;
  }

  .sidebar-navigation li a {
    padding: 10px 15px 10px 30px;
    display: block;
    color: #fff;
  }

  .sidebar-navigation li .fa {
    margin-right: 10px;
  }

  .sidebar-navigation li a:active,
  .sidebar-navigation li a:hover,
  .sidebar-navigation li a:focus {
    text-decoration: none;
    outline: none;
  }

  .sidebar-navigation li::before {
    background-color: #2574A9;
    position: absolute;
    content: '';
    height: 100%;
    left: 0;
    top: 0;
    -webkit-transition: width 0.2s ease-in;
    transition: width 0.2s ease-in;
    width: 3px;
    z-index: -1;
  }

  .sidebar-navigation li:hover::before {
    width: 100%;
  }

  .sidebar-navigation .header {
    font-size: 12px;
    text-transform: uppercase;
    background-color: #151515;
    padding: 10px 15px 10px 30px;
  }

  .sidebar-navigation .header::before {
    background-color: transparent;
  }

  .content-container {
    padding-left: 220px;
  }
    </style>
</head>
<body>
  <script type="text/javascript">
  $(document).ready(function(){
$("#menu-toggle").click(function(e){
  e.preventDefault();
  $("#wrapper").toggleClass("menuDisplayed");
});
});
  </script>
    <div id="app">
      <!--  <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <ul class="navbar-nav ml-auto">
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
       -->
       <div class="sidebar-container">
     <div class="sidebar-logo">

       ESI-Scolarité
     </div>
     <ul class="sidebar-navigation">
       <li class="header">Navigation</li>
       <li>
         <a href="#">
           <i class="fa fa-home" aria-hidden="true"></i> Acceuil
         </a>
       </li>
       <li>
         <a href="#">
           <i class="fa fa-tachometer" aria-hidden="true"></i> gérer mon comptes
         </a>
       </li>
       <li class="header"></li>
       <li>
         <a href="#">
           <i class="fa fa-users" aria-hidden="true"></i> Mes absences
         </a>
       </li>
       <li>
         <a href="#">
           <i class="fa fa-cog" aria-hidden="true"></i> other stuff
         </a>
       </li>
       <li>
         <a href="#">
           <i class="fa fa-info-circle" aria-hidden="true"></i> Information
         </a>
       </li>
     </ul>
   </div>

   <div class="content-container">

     <div class="container-fluid">
       <!-- Main component for a primary marketing message or call to action -->
       <div class="jumbotron">
         <main class="py-4">
             @yield('content')
         </main>
       </div>

     </div>
   </div>


    </div>
</body>
</html>
