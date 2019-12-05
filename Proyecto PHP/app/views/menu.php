<html>
    <head>
        <meta charset="UTF-8">
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">        
        <title>Inicio de sesión</title>
    </head>
    <body>
        <h1>Bienvenido a Paco's garden s.l</h1>
        <h3>¿Qué desea hacer?</h3>
        <?php
        session_start();
        if ($_SESSION['admin']) {
            ?>
            <button onclick="location.href = 'Listar.php?pagina=1'">Listar tareas</button>
            <button onclick="location.href = 'AnadirTarea.php'"> Añadir una tarea </button>
        <?php
        } else {
            header('Location: Listar.php');
        }
        ?>
    </body>
</html>
