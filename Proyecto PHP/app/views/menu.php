<?php
session_start();
if (isset($_SESSION['admin'])) {
        ?>
        <html>
            <head>
                <meta charset="UTF-8">
                <title>Inicio de sesión</title>
            </head>
            <body>
                <h1>Bienvenido a Paco's garden s.l</h1>
                <h3>¿Qué desea hacer?</h3>
                <button onclick="location.href = '../controllers/Listar.php'">Listar tareas</button>
                <?php 
                if($_SESSION['admin']){?>
                <button onclick="location.href = '../controllers/AnadirTarea.php'"> Añadir una tarea </button>
                <button onclick="location.href = '../Acciones/BuscarTareas.php'"> Buscar tarea </button>
                <?php }
                else{ ?>
                <button onclick="location.href = '../Acciones/BuscarTarea.php'"> Buscar tarea </button>
                <?php }?>
            </body>
        </html>
        <?php
} else {
    header('Location: ../../index.php');
}