<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <!--<link rel="stylesheet" href="/css/app.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">-->

    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">-->
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <!--<link rel="stylesheet" href="/css/app.css">-->

    <title>Mi sitio</title>
</head>
<body>
<header>
    <?php  function activeMenu($url){
            return request()->is($url) ? 'active' : '';
        }
    ?>


        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item {{ activeMenu('/') }}">
                        <a class="nav-link" href="{{ route('home') }}">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item {{ activeMenu('saludos*') }}">
                        <a class="nav-link" href="{{ route('saludos','Carlos') }}">Saludos</a>
                    </li>
                    <li class="nav-item {{ activeMenu('mensajes/create') }}">
                        <a class="nav-link" href="{{ route('mensajes.create') }}">Contactos</a>
                    </li>
                    @if(auth()->check())
                        <li class="nav-item {{ activeMenu('mensajes*') }}">
                            <a class="nav-link" href="{{ route('mensajes.index') }}">Mensajes</a>
                        </li>
                            @if(auth()->user()->hasRoles(['admin','estudiante']))
                            <li class="nav-item {{ activeMenu('usuarios*') }}">
                                <a class="nav-link" href="{{ route('usuarios.index') }}">Usuarios</a>
                            </li>
                        @endif
                    @endif

                    <!--<li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Dropdown
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#">Disabled</a>
                    </li>-->
                </ul>
                <ul class="navbar-nav">

                    @if(auth()->check())

                        <!-- Dropdown -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                                {{ auth()->user()->name }}
                            </a>
                            <div class="dropdown-menu">
                                <a class="nav-link" href="/usuarios/{{ auth()->id() }}/edit">Mi cuenta</a>
                                <a class="nav-link" href="/logout" >Salir</a>
                            </div>

                        </li>

                    @endif
                    @if(auth()->guest())
                            <li class="btn btn-outline-success my-2 my-sm-0">
                                <a class="nav-link" href="/login">Login</a>
                            </li>

                    @endif



                </ul>
                <!--<form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>-->
            </div>
            </div>
        </nav>



    <!--<h1>{{ request()->is('/') ? 'Estas en el home' : 'No estas en el home' }}</h1>-->

</header>
<div class="container">
    @yield('contenido')
    <footer>Copyright {{date('Y')}}</footer>
</div>


<!--<script href="/js/app.js"></script>-->




<!--<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>-->


<script src="/js/jquery-3.2.1.slim.min.js"></script>
<script src="/js/popper.min.js"></script>
<script src="/js/bootstrap.min.js"></script>


</body>
</html>
