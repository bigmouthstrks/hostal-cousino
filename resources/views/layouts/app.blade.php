<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Free Web tutorials">
        <meta name="keywords" content="HTML,CSS,XML,JavaScript">
        <meta name="author" content="John Doe">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Bootrstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

        <!-- CSS -->
        <link rel="stylesheet" type="text/css" href="{{ asset('/css/app.css') }}">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&family=Raleway:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;900&family=Source+Sans+Pro:ital,wght@0,300;0,700;1,400&display=swap" rel="stylesheet"> 
        
        <!-- FontAwesome Icons -->
        <script src="https://kit.fontawesome.com/9c85c53d3e.js" crossorigin="anonymous"></script>

        <title>Hostal Cousiño</title>

    </head>
    <body>
        @include('partials.navbar')
        {{-- 

        Si hay una sesión activa de un usuario funcionario se muestra la Barra de Herramientas ('toolbar') 

        @include('partials.toolbar')

        --}}
        <div class="container border rounded h-100 w-100 mb-2 mt-2 pt-2 pb-2" id="view-content">
            @yield('main')
        </div>
        @include('partials.footer')

        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>