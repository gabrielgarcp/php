<?php
//Iniciamos sesion
session_start();
//Comprobamos si esta declarada la variable 'admin' de la sesion
if (isset($_SESSION['admin'])) {
    //Comprobamos si no esta declarada la variable tareas de al sesion o hemos pulsado el boton de listar tareas en el menu
    if (!isset($_SESSION['tareas'])||(isset($_POST['listar_tareas']))) {
        //Incluimos las funciones
        include __DIR__ . '/../models/funciones.php';
        //Cargamos el paginacion en una variable
        $paginacion = paginacion();
        //Cargamos todas las tareas extraidas por una funcion en una variable
        $tareas = ListaTareas($paginacion['inicio'], $paginacion['tarea_x_pagina']);
    } else {
        //Si la variable 'tareas' esta definida y no hemos pulsado el boton de listar tareas se cargara las tareas de la variable de la sesion en una variable
        $tareas = $_SESSION['tareas'];
    }
    //Cargamos las vistas del usuario que será la cabecera y la de listar las tareas que será el cuerpo
    include __DIR__ . '/../views/usuario.php';
    include __DIR__ . '/../views/ListarTareas.php';
} else {
    //Si no esta definida la variable 'admin' de la session significa que no hemos iniciado sesion con lo cual redirigios al inicio de la aplicacion para que inicie sesion
    ?>
    <script type="text/javascript">
        alert("No has iniciado sesion");
        window.location.href = "../index.php";
    </script>
    <?php
}
//Funcion de la paginacion
function paginacion() {
    //Asignamos a una variable el numero de tareas por pagina
    $tareas_x_pagina = 3;
    //Cargamos en una variable el numero de apginas totales que es el resultado al alza de la division del numero de tareas entre el numero de tareas por pagina
    $paginas = ceil(numTareas() / $tareas_x_pagina);
    //Comprobamos si el numero del parámetro get 'pagina' es mayor que el número de páginas totales, menor que 1 o si el contenido no es un numero
    if ($_GET['pagina'] > $paginas ||$_GET['pagina'] < 1|| !is_numeric($_GET['pagina'])) {
        header('Location: Listar.php?pagina=1');
    }
    //Devolvemos un array cuyo contenido tiene la página actual, el total de paginas y las tareas por pagina
    return $pag = ['inicio' => ($_GET['pagina'] - 1) * $tareas_x_pagina,
        'paginas' => $paginas,
        'tarea_x_pagina' => $tareas_x_pagina];
}
