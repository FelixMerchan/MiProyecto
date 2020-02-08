<!DOCTYPE html>
<html lang="en">
    <head>
        <title>API</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    </head>
    <body>
    
        <div class="container">
            <h2>Formulario de Registro</h2>
            <br>

            <form class="form-horizontal" action="{{ route('guardar_post')}}" method="post">
                @csrf

                <p>Ingrese el Id:</p>
                <input name="id" class="form-control" type="text" required>

                <p>Ingrese el User Id:</p>
                <input name="userId" class="form-control" type="text" required>

                <p>Ingrese el Title:</p>
                <input name="title" class="form-control" type="text" required>

                <p>Ingrese el Body:</p>
                <input name="body" class="form-control" type="text" required>

                <br>
                <input type="submit" class="btn btn-primary" value="Guardar">

            </form>
        </div>

    </body>
</html>
