<html>
    <head>
        <meta charset="UTF-8">
        <title>Eliminar tarea</title>
    </head>
    <body>
        <form action="../../controllers/EliminarTarea.php" method="POST">
            <input type="text" name="id" value="<?=$_GET['id']?>" hidden/>
            <p> ¿Estas seguro que quieres eliminar la tarea <?= $_GET['id'] ?>?</p>
            <input type="submit" name="bs" value="Si"/>
            <input type="submit" name="bn" value="No"/>
        </form>
    </body>
</html>

