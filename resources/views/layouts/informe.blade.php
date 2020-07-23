<!DOCTYPE html>
<html>
<head>
    <title>Informe mensual - Hostal Cousiño</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
    <style>

        #contenedor_principal {
            background-color:#f5fffe;
        }

        #titulo_documento{
            font-size: 1.4em;
        }

        #ingreso_mensual{
            font-size: 1.2em;
        }

        #title{
            font-size: 1.2em;
        }

        ul{
            list-style: none;
        }

    </style>
    <div class="bg-dark">
        <div class="container p-2">
            <p class="text-center text-light" id="title"><small>Hostal Cousiño </small></p>
        </div>

        @yield('main')

        <div class="d-flex align-content-end">
            <div class="container p-1">
                <p class="text-center text-secondary"><small>&#169 Hostal Cousiño </small></p>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>
