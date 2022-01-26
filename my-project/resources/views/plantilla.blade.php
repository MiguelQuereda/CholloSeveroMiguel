<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenid@s a CholloSevero</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
</head>
<body>
    <header>
        <div class="logo">
            <div class="imagen"><img src="{{asset('assets/img/logotipo.png')}}" alt="logoCholloSevero"></div>
            <div class="titulo"><h1>Bienvenido a CholloSevero ||@yield('titulo')</h1></div>
        </div>
        <nav class="menu">
            <ul>
                <li><a href="{{ route('index') }}">Inicio</a></li>
                <li><a href="{{ route('novedades') }}">Novedades</a></li>
                <li><a href="{{ route('populares') }}">Más populares</a></li>
            </ul>
        </nav>
    
    </header>
    <main>
        
        <div class="descripcion">
            @yield('desc')
        </div>
        <div class="nosotros">
            @yield('aUs')
        </div>
        <div class="total">
            @yield('total')
        </div>

        
    </main>
    
</body>
</html>