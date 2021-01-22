<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Teste || Ebert</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" type="text/css" rel="stylesheet">

   @yield('css')
</head>

<body>

    <!-- Simulate a smartphone / tablet -->
    <div class="mobile-container">

        <!-- Top Navigation Menu -->
        <div class="topnav">
            <a id="home" href="/dashboard/main" class="active">Teste || Ebert</a>
            <div id="myLinks">
                <a href="{{ route('users.index') }}">Usuários</a>
                <a href="{{ route('products.index') }}">Produtos</a>
                <a href="/logout">Logout</a>
            </div>
            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                <i class="fa fa-bars" aria-hidden="true"></i>
            </a>
        </div>
    </div>




    @yield('container')


    <script>
        function myFunction() {
            var x = document.getElementById("myLinks");
            if (x.style.display === "block") {
                x.style.display = "none";
            } else {
                x.style.display = "block";
            }
        }
        </script>


<footer class="bg-light text-center text-lg-start myclass text-center">
  <div class="container p-4">
    <div  class="row">
      <div  style="max-width: 100%; flex: 0 0 100%" class="col-lg-6 col-md-12 mb-4 mb-md-0">
        <h5 class="text-uppercase">Sistema para teste</h5>

        <p>
         Todo o front-end e back-end desta aplicação foi desenvolvido com o propósito de ser avaliado, e sendo assim, o mesmo constata-se 100% original e não comercializável.
        </p>
      </div>

  </div>



  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
    © 2020 Copyright:
    <a class="text-dark" href="https://pontesdev.com.br/">pontesdev.com.br</a>
  </div>

</footer>


    <script href="{{ asset('js/bootstrap.min.js') }}"> </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

    <script src="{{asset('js/main.js')}}"></script> 

    @yield('scripts')
</body>

</html>
