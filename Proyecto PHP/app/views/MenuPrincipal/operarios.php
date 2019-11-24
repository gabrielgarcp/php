<?php
session_start();
if (isset($_SESSION['admin'])) {
    if ($_SESSION['admin'] == 'no') {
        ?>
        <html>
            <head>
                <meta charset="UTF-8">
                <title>Inicio de sesión</title>
            </head>
            <body>
                <h1>Bienvenido a Paco's garden s.l</h1>
                <h3>¿Qué desea hacer?</h3>
                <button onclick="location.href = '../../controllers/ListarTareas.php'">Listar tareas</button>
                <button onclick="location.href = '../../controllers/CompletarTarea.php'"> Completar tarea </button>
                <button onclick="location.href = '../../controllers/BuscarTarea.php'"> Buscar tarea </button>
            </body>
        </html>
        <?php
    } else {
        ?>
        <p> No tienes permisos para acceder al este menú de los operarios</p>
        <?php
        include 'admin.php';
    }
} else {
    header('Location: ../../index.php');
}