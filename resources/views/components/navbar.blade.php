<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <title>CV VIDEO</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light d-flex" style="background-color:">
        <div class="container-fluid d-flex justify-content-around">
          {{-- <a class="navbar-brand" href="#">Navbar</a> --}}
            <div class="" >
                <a href="{{ route('dashboard') }}">
                    <x-application-logo/>
                </a>
                
            </div>


            @if (Route::has('login'))
                <div class="">
                    <ul class="navbar-nav fw-bold">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="nav-link me-4" style="color: #F76300">Profile</a>
                    @else
                        <li class="nav-item">
                            <a href="{{ route('login') }}" class="nav-link me-4" style="color: #F76300">Se Connecter</a>
                        </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a href="{{ route('register') }}" class="nav-link" style="color: #F76300">S'inscrire</a>
                        </li>  
                    </ul>     
                    @endif
                    @endauth
                </div>
             @endif
        </div>
       
      </nav>

      <div  style="background-color: ">
      @yield('content')
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>