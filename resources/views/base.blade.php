<!DOCTYPE html>
<html lang="{{ config ('app.locale') }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name')}} @yield('page_title')</title>
    @section('vite')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @show
</head>
<body>
    <header>
        <nav>
            <ul>
                @auth
                <table class="header-admin" width ="100%">
                    <td>
                        <li> <a href="{{ route('dashboard')}}"> Tableau de bord</a> </li> 
                    </td>
                    <td>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();"> Déconnexion</a>
                        </form>
                    </td>
                </table>
                @else   
                    <table class="header-user" width ="100%">
                            <td><a href="{{ route('home')}}">Accueil</a></td>
                            <td><a href="{{ route('menu')}}">Menu</a></td>
                            <th><a href="{{ route('home')}}">O'CNAMO</a></th>
                            <td><a href="{{ route('contact')}}">Contact</a></td>
                            <td><a href="{{ route('reservation')}}">Réserver</a></td>
                    </table>
                @endauth
            </ul>
        </nav>
    </header>
    @section('content')
    @show
    <footer>
            <ul>
                @guest
                <li> <a href="{{ route('login')}}"> Connexion </a></li>
                @endguest
                <li>Copyright O Cnamo, 2022</li>
                <li>//</li>
                <li><a href="{{ route('contact')}}">Contact</a></li>
                <li>//</li>
                <li><a href="{{ route('reservation')}}">Réservation</a></li>
                <li>//</li>
                <li><a href="{{ route('mentions_legales')}}">Mentions Légales</a></li>
            </ul>
    </footer>
</body>
</html>