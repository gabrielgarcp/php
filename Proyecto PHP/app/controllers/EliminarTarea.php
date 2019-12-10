<?php
//Iniciamos sesion
session_start();
//Comprobamos si la variable 'admin' de la sesion está declarada
if (isset($_SESSION['admin'])) {
    //Si esta declarada comprobamos si es verdadera
    if ($_SESSION['admin']) {
        //Comprobamos si no hemos enviado nada por post
        if (!$_POST) {
            //Si no hemos enviado nada cargamos la cabecera que es el usuario y el cuerpo que es la vista de eliminar tarea
            include __DIR__.'/../views/usuario.php';
            include __DIR__.'/../views/EliminarTarea.php';
        } else {
            //Si hemos enviado algo por post cargamos las funciones 
            include __DIR__.'/../models/funciones.php';
            //Guardamos la id de la tarea a eliminar en una variable
            $id = $_POST['id'];
            //Comprobamos si hemos pulsado 'si'
            if (isset($_POST['bs'])) {
                //Si hemos pulsado 'si' ejecutamos la funcion de eliminacion q le pasamos como paramatro ña id de la tarea a eliminar y el resultado lo mostramos en una alerta
                ?>
                <script type="text/javascript">
                    alert("<?= eliminarTarea($id) ?>");
                    window.location.href = "Listar.php";
                </script>
                <?php
                //Comprobamos si hemos pulsado 'no' 
            } elseif (isset($_POST['bn'])) {
                //Si hemos pulsado 'no' redirigimos al controlador de listar
                header('Location: Listar.php');
            }
        }
    } else {
        //Si la variable 'admin' de la sesion es falsa mostramos una alerta diciendo que no tenemos permisos para eliminar una tarea y redirigimos al controlador de listar
        ?>
        <script type="text/javascript">
            alert("No tienes permisos para eliminar una tarea");
            window.location.href = "../Listar.php";
        </script>
        <?php
    }
} else {
    //Si no esta declarada la variable 'admin' significa que nadie ha iniciado sesion con lo cual redirigimos a al inicio de la aplicacion para que inicie sesion 
    ?>
    <script type="text/javascript">
        alert("No has iniciado sesion");
        window.location.href = "../index.php";
    </script>
 <?php
}
