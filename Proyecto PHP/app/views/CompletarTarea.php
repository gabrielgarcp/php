<html>
    <head>
        <meta charset="UTF-8">
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">        
        <title>Completar tarea</title>
    </head>
    <body>
        <form method="POST">
            <label>Tarea <input type="text" name="id" value="<?= $id ?>" size="1" readonly/></label>
            <br>
            <fieldset>
                <legend>Estado</legend>
                <label><input type="radio" name="estado" value="P" /> Pendiente </label> <br>
                <label><input type="radio" name="estado" value="R" checked /> Realizada</label> <br>
                <label><input type="radio" name="estado" value="C" /> Cancelada</label>
            </fieldset>
            <br>
            <p><label> Anotaciones anteriores: <input type="text" name="anotaciones_anteriores" value="<?= $datosTarea['anotaciones_anteriores'] ?>"/></label></p>
            <p><label> Anotaciones posteriores: <input type="text" name="anotaciones_posteriores" value="<?= $datosTarea['anotaciones_posteriores'] ?>"/> </label></p>
            <p><input type="submit" name="Completar" value="Enviar"/></p>
        </form>
    </body>
</html>
