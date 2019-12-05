<html>
    <head>
        <meta charset="UTF-8">
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">        
        <title>Eliminar tarea</title>
    </head>
    <body>
        <form method="POST">
            <input type="text" name="id" value="<?=$_GET['id']?>" hidden/>
            <p> ¿Estas seguro que quieres eliminar la tarea <?= $_GET['id'] ?>?</p>
            <input type="submit" name="bs" value="Si"/>
            <input type="submit" name="bn" value="No"/>
        </form>
    </body>
</html>

