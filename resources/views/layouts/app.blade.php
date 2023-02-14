<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Foodie') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> 

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"> 
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>

    <!-- link bootstrap aggiunto io -->
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container fluid">
            @guest
                <a class="navbar-brand" href="/home">
                    Foodie
                </a>
                @else
                <a class="navbar-brand" href="/home">
                    Foodie
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- barra di ricerca -->

                <form action="{{ url('search') }}" method="GET" role="search">
                    <div class="input-group">
                        <input type="search" name="search" value="" placeholder="Ricerca rapida" class="form-control me-2" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </div>
                </form>

            @endguest
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul> 

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="/login">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="/register">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                        @if(Auth::user()->admin == "1")
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a> 
                                
                               <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                    <!-- Visualizzare il proprio profilo -->
                                    <a class="dropdown-item" href="{{ route('user.show') }}">
                                        Il mio profilo
                                    </a>
                                    
                                    <!-- visualizzare le proprie ricette-->
                                    <a class="dropdown-item" href="{{ route('user.recipe') }}">
                                       Le mie ricette
                                    </a>

                                    <!-- Visualizzare le ricette salvate -->
                                    <a class="dropdown-item" href="{{ route('saved.index')}}">
                                        Le ricette salvate
                                    </a>
                                                                
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                                                    
                                    <!--Per fare il logout:-->
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>

                            <!-- menù per inserimento -->
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{__('Inserimento')}}
                                </a> 
                                
                               <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                    <a class="dropdown-item" href="{{ route('recipe.create') }}">
                                    {{__('Ricetta')}}
                                    </a>
                                    
                                    <a class="dropdown-item" href="{{ route('add.ingredient') }}">
                                    {{ __('Ingrediente') }}
                                    </a>

                                    <a class="dropdown-item" href="{{ route('add.category') }}">
                                    {{ __('Categoria') }}
                                    </a>
                                    
                                </div>
                            </li>

                            <!-- menù per modificare le varie entità -->
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{__('Modifica')}}
                                </a> 
                                
                               <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                    <a class="dropdown-item" href="{{ route('user.index') }}">
                                    {{__('Utenti')}}
                                    </a>

                                    <a class="dropdown-item" href="{{ route('recipe_index.adm') }}">
                                    {{__('Ricette')}}
                                    </a>
                                    
                                    <a class="dropdown-item" href="{{ route('ingredient_index.adm') }}">
                                    {{ __('Ingredienti') }}
                                    </a>

                                    <a class="dropdown-item" href="{{ route('category_index.adm') }}">
                                    {{ __('Categorie') }}
                                    </a>
                                    
                                    
                                </div>
                            </li>


                            <!-- pagina ricerca avanzata-->
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('advanced.search') }}">{{__('Ricerca avanzata')}}</a> 
                            </li>
                        @else

                        <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a> 
                                
                               <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                    <!-- Visualizzare il proprio profilo -->
                                    <a class="dropdown-item" href="{{ route('user.show') }}">
                                        Il mio profilo
                                    </a>
                                    
                                    <!-- visualizzare le proprie ricette-->
                                    <a class="dropdown-item" href="{{ route('user.recipe') }}">
                                       Le mie ricette
                                    </a>

                                    <!-- Visualizzare le ricette salvate -->
                                    <a class="dropdown-item" href="{{ route('saved.index')}}">
                                        Le ricette salvate
                                    </a>
                                                                
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                                                    
                                    <!--Per fare il logout:-->
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>

                            <!-- menù per inserimento -->
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{__('Inserimento')}}
                                </a> 
                                
                               <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                    <a class="dropdown-item" href="{{ route('recipe.create') }}">
                                    {{__('Ricetta')}}
                                    </a>
                                    
                                    <a class="dropdown-item" href="{{ route('add.ingredient') }}">
                                    {{ __('Ingrediente') }}
                                    </a>

                                    <a class="dropdown-item" href="{{ route('add.category') }}">
                                    {{ __('Categoria') }}
                                    </a>
                                    
                                </div>
                            </li>

                            <!-- menù per visualizzare le varie entità -->
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{__('Visualizza')}}
                                </a> 
                                
                               <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('recipes.index') }}">
                                    {{__('Ricette')}}
                                    </a>
                                    
                                    <a class="dropdown-item" href="{{ route('ingredients') }}">
                                    {{ __('Ingredienti') }}
                                    </a>

                                    <a class="dropdown-item" href="{{ route('categories') }}">
                                    {{ __('Categorie') }}
                                    </a>
                                    
                                </div>
                            </li>


                            <!-- pagina ricerca avanzata-->
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('advanced.search') }}">{{__('Ricerca avanzata')}}</a> 
                            </li>

                        @endif

                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    
</body>
</html>