<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Free Web tutorials">
        <meta name="keywords" content="HTML,CSS,XML,JavaScript">
        <meta name="author" content="John Doe">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Bootrstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

        <!-- CSS -->
        <link rel="stylesheet" type="text/css" href="{{ asset('/css/app.css') }}">


        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;900&family=Source+Sans+Pro:ital,wght@0,300;0,700;1,400&display=swap" rel="stylesheet">

        <!-- FontAwesome Icons -->
        <script src="https://kit.fontawesome.com/9c85c53d3e.js" crossorigin="anonymous"></script>

        <!-- Friconix Icons -->
        <script defer src="https://friconix.com/cdn/friconix.js"> </script>

        <title>Hostal Cousiño</title>

    </head>
    <body>
        @include('partials.navbar')
        {{--

        Si hay una sesión activa de un usuario funcionario se muestra la Barra de Herramientas ('toolbar')

        @include('partials.toolbar')

        --}}
        <div class="container h-100 w-100 mb-2 mt-2 pt-2 pb-2" id="view-content">
            @yield('main')
        </div>
        @include('partials.footer')

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    @yield('scripts')
    </body>
</html>
