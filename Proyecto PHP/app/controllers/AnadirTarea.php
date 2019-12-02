<?php
session_start();
if (isset($_SESSION['admin'])) {
    if ($_SESSION['admin']) {
        include '../models/funciones.php';
        if (!isset($_POST['Anadir'])) {
            include '../views/AnadirTarea.php';
        } else {
            $campos = $_POST;
            $errores = filtrardatos();
            if (empty($errores)) {
                if ($_POST['fecha_realizacion'] == "") {
                    $fech_re = null;
                } else {
                    $fech_re = date("Y-m-d", strtotime($_POST['fecha_realizacion']));
                }
                $resultado_anadir = nuevaTarea($_POST['id'], $_POST['descripcion'], $_POST['persona_contacto'], $_POST['telefono_contacto'], $_POST['correo'], $_POST['direccion'], $_POST['poblacion'], $_POST['codigo_postal'], $_POST['provincia'], $_POST['estado'], date("Y-m-d"), $_POST['operario_encargado'], $fech_re, $_POST['anotaciones_anteriores'], $_POST['anotaciones_posteriores']);
                ?>
                <script type="text/javascript">
                    alert("<?= $resultado_anadir ?>");
                    window.location.href = "Listar.php";
                </script>
                <?php
            } else {
                include '../views/AnadirTarea.php';
            }
        }
    } else {
        ?>
        <script type="text/javascript">
            alert("No tienes permisos para añadir una tarea");
            window.location.href = "Listar.php";
        </script>
        <?php
        include('Location: menu.php');
    }
} else {
    ?>
    <script type="text/javascript">
        alert("No has iniciado sesion");
        window.location.href = "Listar.php";
    </script>
    <?php
    header('Location: ../index.php');
}

function filtrardatos() {
    $errores = [];
    if (isset($_POST['Anadir'])) {
        if (empty($_POST['descripcion'])) {
            array_push($errores, "La descripción esta vacía.");
        }
        if (empty($_POST['persona_contacto'])) {
            array_push($errores, "La persona de contacto esta vacía.");
        }
        if (empty($_POST['telefono_contacto'])) {
            array_push($errores, "El teléfono es obligatorio.");
        }
        if (isset($_POST['codigo_postal'])) {
            if (!filter_var($_POST['codigo_postal'], FILTER_VALIDATE_INT) && strlen($_POST['codigo_postal'] == 5)) {
                array_push($errores, "Codigo postal invalido. Su formato es de 5 números.");
            }
        }
        if (empty($_POST['correo'])) {
            if (!filter_var($_POST['correo'], FILTER_VALIDATE_EMAIL)) {
                array_push($errores, "Email incorrecto");
            }
        }
        if (isset($_POST['fecha_realización'])) {
            $fecha_actual = strtotime(date("d-m-Y", time()));
            $fecha_entrada = strtotime(date("d-m-Y", $_POST['fecha_realizacion']));
            if ($_POST['fecha_realizacion'] > strtotime(date("d-m-Y", time()))) {
                array_push($errores, "La fecha de realización debe ser posterior a la fecha actual.");
            }
        }
        return $errores;
    }
}
