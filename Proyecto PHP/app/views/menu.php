<html>
    <head>
        <meta charset="UTF-8">
        <title>Inicio de sesión</title>
    </head>
    <body>
        <h1>Bienvenido a Paco's garden s.l</h1>
        <h3>¿Qué desea hacer?</h3>
        <?php
        session_start();
        if ($_SESSION['admin']) {
            ?>
            <button onclick="location.href = 'Listar.php'">Listar tareas</button>
            <button onclick="location.href = 'AnadirTarea.php'"> Añadir una tarea </button>
        <?php
        } else {
            header('Location: Listar.php');
        }
        ?>
    </body>
</html>
