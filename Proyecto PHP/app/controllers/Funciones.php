<?php
include 'Conexionbd.php';
/* Conexion entre modelo y visual */

/* Función muestra tabla de tareas solictadas */



    /* Funcion eliminacion de tarea */

    function BorTarea($conexion, $id_t) {
        $resultado = mysqli_query($conexion, "select * from tareas where tarea_id='$id_t'");
        if (mysqli_num_rows($resultado) > 0) {
            if (!$_POST) {
                ?>            
                <form method="POST">
                    <p> ¿Estas seguro que desea eliminar la tarea numero <?= $id_t ?>?</p>
                    <input type="submit" name="si" value="Si"/>
                    <input type="submit" name="no" value="No"/>
                </form>

                <?php
            } else {
                if (isset($_POST['si'])) {
                    $result = mysqli_query($conexion, "DELETE FROM tareas WHERE tarea_id='$id_t'");
                    echo "La tarea $id_t ha sido borrada correctamente";
                } else if (isset($_POST['no'])) {
                    echo "La tarea $id_t no se ha borrado";
                } else {
                    echo "Error";
                }
            }
        } else {
            echo 'Esta tarea no exite';
        }
    }

    /* Funcion para incluir anotaciones */

    function nwAnotaciones($conexion, $id_t) {
        $consulta = mysqli_query($conexion, "select Anotaciones_ant, Anotaciones_pos from tareas where='$id_t'");
        $an_an = mysqli_fetch_array($consulta)['Anotaciones_ant'];
        $an_po = mysqli_fetch_array($consulta)['Anotaciones_pos'];
        if (!$_POST) {
            ?>
            <form method="POST">
                <label> Anotaciones anteriores <input type="text" name="anot_a" value="<?= $an_an ?>"/></label>
                <label> Anotaciones posteriores <input type="text" name="anot_p" value="<?= $an_po ?>"/></label>
                <input type="submit" name="anadir" value="Añadir"/>
            </form>

            <?php
        } else {
            if (isset($_POST['anadir'])) {
                $result = mysqli_query($conexion, "update tareas set Anotaciones_ant='" . $_POST['anot_a'] . "',Anotaciones_pos='" . $_POST['anot_p'] . "' where=tarea_id=$id_t");
                echo "Las anotaciones de la tarea $id_t se han añadido correctamente";
            } else {
                echo "Eroor las anotaciones no se han añadido correctamente";
            }
        }
    }

    /* Funcion para buscar tareas por campos */

    function busTarea($conexion) {
        if (!$_POST) {
            ?>
            <form method="POST">
                <select name="b">
                    <option value="Poblacion">Población</option>
                    <option value="Estado">Estado</option>
                    <option value="Operario_encargado">Operario encargado</option>
                </select>
                <input type="text" name="texto" id="text"/>               
                <input type="submit" name="bus" value="Buscar"/>
            </form>   
            <?php
        } else {
            if (isset($_POST['bus'])) {
                tabTareas($conexion, "select * from tareas where " . $_POST['b'] . "='" . $_POST['texto'] . "'");
            } else {
                echo 'Error';
            }
        }
    }


    