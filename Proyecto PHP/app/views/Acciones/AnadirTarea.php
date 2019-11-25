<?php
session_start();
if (isset($_SESSION['admin'])) {
    if ($_SESSION['admin'] === 'si') {
        include '../../models/funciones.php';
        ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Añadir tarea</title>
    </head>
    <body>
        <form action="../../controllers/anadirTarea.php" method="POST">
            <p><label> Id: <input type="text" name="id" value="<?= idUltimoRegistroTarea() + 1 ?>" size="1" readonly /></label></p>
            <p><label> Descripción: <input type="text" name="descripcion"/> </label></p>
            <p><label> Persona de contacto: <input type="text" name="persona_contacto"/> </label></p>
            <p><label> Teléfono de contacto: <input type="text" name="telefono_contacto"/> </label></p>
            <p><label> Email de contacto: <input type="email" name="correo"/> </label></p>
            <p><label> Dirección: <input type="text" name="direccion"/></label></p>
            <p><label> Población <input type="text" name="poblacion"/> </label></p>
            <p><label> Código Postal <input type="number" name="codigo_postal" size="5"/> </label></p>
            <p><label> Provincia 
                    <select name="provincia">
                        <?php
                        $provincias = ListaProvincias();
                        foreach ($provincias as $reg):
                            ?>
                            <option value="<?= $reg['cod'] ?>"><?= $reg['nombre'] ?></option>
                            <?php
                        endforeach;
                        ?>
                    </select>
                </label></p>
            <p><label> Estado: <input type="text" name="estado" size="1"/> </label></p>
            <p><label> Operario encargado: <input type="text" name="operario_encargado"/> </label></p>
            <p><label> Fecha de realización: <input type="date" name="fecha_realizacion"/> </label></p>
            <p><label> Anotaciones anteriores: <input type="text" name="anotaciones_anteriores"/> </label></p>
            <p><label> Anotaciones posteriores: <input type="text" name="anotaciones_posteriores"/> </label></p>
            <input type="submit" name="Enviar" value="Enviar"/>
        </form>
    </body>
</html>
        <?php
    } else {
        ?>
        <p> No tienes permiso para añadir una tarea</p>
        <?php
        include '../MenuPrincipal/operarios.php';
    }
} else {
    header('Location: ../../index.php');
}
   



    



