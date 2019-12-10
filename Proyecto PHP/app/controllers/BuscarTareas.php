<?php

//Iniciamos sesion
session_start();
//Comprobamos si esta declarada la variable de 'admin' de session
if (isset($_SESSION['admin'])) {
//Comprobamos si hemos pulsado el botón 'buscar'
    if (!$_POST['buscar']) {
        //Si no lo hemos pulsado mostramos la vista de Buscar Tareas
        include __DIR__ . '/../views/BuscarTareas.php';
    } else {
        //Si lo hemos pulsado guardamos todos os datos introducidos en el formulario del buscador en una variable
        $d_buscar = $_POST;
        //Ahora llamamos a la funcion de filtrar los datos que nos han enviado y guardamos en una variable los errores que puedan haber
        $errores_buscar = filtrarbuscar();
        //Comprobamos si hay errores
        if (empty($errores_buscar)) {
            //Si no hay errores al texto de la poblacion y del operario le añadimos '%' que nos servira luego para la sentencia sql
            if ($d_buscar['poblacion'] === "LIKE") {
                $d_buscar['text_poblacion'] .= "%";
            }
            if ($d_buscar['operario'] == "LIKE") {
                $d_buscar['text_operario'] .= "%";
            }
            //Incluimos las funciones
            include __DIR__ . '/../models/funciones.php';
            //En una variable le introducimos el resultado de la funcion de numero de tareas de buscar
            $numtareas = numTareasBuscar($d_buscar['poblacion'], $d_buscar['text_poblacion'], $d_buscar['fech_creacion'], $d_buscar['text_fecha'], $d_buscar['operario'], $d_buscar['text_operario']);
            //Creamos la paginacion
            $paginacion = paginacion($numtareas);
            //En una variable le introducimos las tareas encontradas con los datos introducidos
            $tareas = buscarTareas($d_buscar['poblacion'], $d_buscar['text_poblacion'], $d_buscar['fech_creacion'], $d_buscar['text_fecha'], $d_buscar['operario'], $d_buscar['text_operario'], $paginacion['inicio'], $paginacion['tarea_x_pagina']);
            //Renaudamos la sesion y creamos una variable 'tareas' donde le añadimos las tareas buscadas y redireccionamos a la pagina de listar
            session_start();
            $_SESSION['tareas'] = $tareas;
            header('Location: Listar.php');
        } else {
            //Si hay algun error devolvemos de nuevo la vista del formulario de buscar tareas
            include __DIR__ . '/../views/BuscarTareas.php';
        }
    }
} else {
    //Si no esta declara de la variable 'admin' de sesion, mostramos un mensaje de alerta diciendo que no se ha iniciado sesión y redirigimos al inicio de la aplicacion para que incie sesión
    ?>
    <script type="text/javascript">
        alert("No has iniciado sesion");
        window.location.href = "../index.php";
    </script>
    <?php

}

//Funcion de filtrar los datos
function filtrarbuscar() {
    //Creamos un array
    $errores = [];
    //Si el campo de la poblacion esta vacio introducimos en el array 'Poblacion obligatoria'
    if (empty($_POST['text_poblacion'])) {
        array_push($errores, "Población obligatoria");
    }
    //Si el campo de la fecha esta vacio introducimos en el array 'Fecha obligatoria'
    if ($_POST['text_fecha'] == "") {
        array_push($errores, "Fecha obligatoria");
    }
    //Si el campo del operario esta vacio introducimos en el array 'Operario obligatorio'
    if (empty($_POST['text_operario'])) {
        array_push($errores, "Operario obligatorio");
    }
    //Devolvemos los errores
    return $errores;
}

//Funcion de la paginacion pasandole como parámetro el numero de las tareas que se van a visualizar
function paginacion($numtareas) {
    //Asignamos en una variable el numero de tareas por pagina   
    $tareas_x_pagina = 3;
    // en una variable cargamos el resultado al alza de dividir el numero de las tareas entre el numero de tareas por pagina 
    $paginas = ceil($numtareas / $tareas_x_pagina);
    // Iniciamos la variabe de la pagina actual
    $pagina_actual = 0;
    if (isset($_GET['pagina'])) {
        //Si hay un parametro get con el valor de la pagina a la variable d ela pagina actual le asignamos ese valor
        $pagina_actual = $_GET['pagina'];
    } else {
        // Si no hay un parámetro get con el valor de la pagina le asignamos la pagna de inicio que es la 1
        $pagina_actual = 1;
    }
    //Devolvemos un array q contiene la pagina actual, el total de paginas y las tareas por pagina
    return $pag = ['inicio' => ($pagina_actual - 1) * $tareas_x_pagina,
        'paginas' => $paginas,
        'tarea_x_pagina' => $tareas_x_pagina];
}
