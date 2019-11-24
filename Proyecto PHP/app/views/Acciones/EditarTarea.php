<?php
include '../../controllers/datosTarea.php';
$id = $_GET['id'];
$datosTarea = datos($id);
session_start();
if (isset($_SESSION['admin'])) {
    if ($_SESSION['admin'] == 'si') {
        ?>
        <!DOCTYPE html>
        <html>
            <head><meta charset="UTF-8"></head>
            <body>
                <form action="../../controllers/editarTarea.php" method="POST">
                    <p><label> Id: <input type="text" name="id" value="<?= $datosTarea['id'] ?>" size="1" readonly /></label></p>
                    <p><label> Descripción: <input type="text" name="descripcion" value="<?= $datosTarea['descripcion'] ?>"/> </label></p>
                    <p><label> Persona de contacto: <input type="text" name="persona_contacto" value="<?= $datosTarea['persona_contacto'] ?>"/> </label></p>
                    <p><label> Teléfono de contacto: <input type="text" name="telefono_contacto" value="<?= $datosTarea['telefono_contacto'] ?>"/> </label></p>
                    <p><label> Email de contacto: <input type="email" name="correo" value="<?= $datosTarea['correo'] ?>"/> </label></p>
                    <p><label> Dirección: <input type="text" name="direccion" value="<?= $datosTarea['direccion'] ?>"/></label></p>
                    <p><label> Población <input type="text" name="poblacion" value="<?= $datosTarea['poblacion'] ?>"/> </label></p>
                    <p><label> Código Postal <input type="number" name="codigo_postal" size="5" value="<?= $datosTarea['codigo_postal'] ?>"/> </label></p>
                    <p><label> Provincia 
                            <select name="provincia">
                                <?php
                                $provincias = ListaProvincias();
                                foreach ($provincias as $reg):
                                    ?>
                                    <option value="<?= $reg['cod'] ?>" <?php if ($reg['cod'] == $datosTarea['provincia']) { ?> selected <?php } ?>><?= $reg['nombre'] ?></option>
                                    <?php
                                endforeach;
                                ?>
                            </select>
                        </label></p>
                    <p><label> Estado: <input type="text" name="estado" size="1" value="<?= $datosTarea['estado'] ?>"/> </label></p>
                    <p><label> Operario encargado: <input type="text" name="operario_encargado" value="<?= $datosTarea['operario_encargado'] ?>"/> </label></p>
                    <p><label> Fecha de realización: <input type="date" name="fecha_realizacion" value="<?= $datosTarea['fecha_realizacion'] ?>"/> </label></p>
                    <p><label> Anotaciones anteriores: <input type="text" name="anotaciones_anteriores" value="<?= $datosTarea['anotaciones_anteriores'] ?>"/> </label></p>
                    <p><label> Anotaciones posteriores: <input type="text" name="anotaciones_posteriores" value="<?= $datosTarea['anotaciones_posteriores'] ?>"/> </label></p>
                    <input type="submit" name="Enviar" value="Enviar"/>
                </form>
            </body>
        </html>
        <?php
    } else {
        ?>
        <p>No tienes permisos para editar una tarea</p>
        <?php
        include '../MenuPrincipal/operarios.php';
    }
} else {
    header('Location: ../../index.php');
}

