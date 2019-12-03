<html>
    <head>
        <meta charset="UTF-8">
        <title>Inicio de sesión</title>
    </head>
    <body>
     <form method="POST" style="float:right"> 
        <label> Buscar: <select name="campo">
                <option value="poblacion"> Población</option>
                <option value="provincia"> Provincia </option>
                <option value="estado"> Estado </option>
                <option value="fecha_creacion"> Fecha de creación </option>
                <option value="operario"> Operrio encargado </option>
            </select>
            <input type="text" name="dato"/></label>
        <input type="submit" name="buscar" value="Buscar">
    </form>
    </p>
    <table border=1 style="text-align:center;">
        <tr>
            <th> Id </th>
            <th> Descripción </th>
            <th> Persona de contacto </th>
            <th> Teléfono de contacto </th>
            <th> Email de contacto </th>
            <th> Dirección </th>
            <th> Población </th>
            <th> C.P. </th>
            <th> Provincia </th>
            <th> Estado </th>
            <th> Fecha de creación </th>
            <th> Operario encargado </th>
            <th> Fecha ralización </th>
            <th> Anotaciones antes de la realización </th>
            <th> Anotaciones después de la realización </th>
            <th> Acciones </th>
        </tr>
        <?php
        foreach ($tareas as $reg):
            ?>
            <tr>
                <td> <?= $reg['id'] ?> </td>
                <td> <?= $reg['descripcion'] ?> </td>
                <td> <?= $reg['persona_contacto'] ?> </td>
                <td> <?= $reg['telefono_contacto'] ?> </td>
                <td> <?= $reg['correo'] ?> </td>
                <td> <?= $reg['direccion'] ?> </td>
                <td> <?= $reg['poblacion'] ?> </td>
                <td> <?= $reg['codigo_postal'] ?> </td>
                <td> <?= $reg['provincia'] ?> </td>
                <td> <?= $reg['estado'] ?> </td>
                <td> <?= date("d/m/Y", strtotime($reg['fecha_creacion'])) ?> </td>
                <td> <?= $reg['operario_encargado'] ?> </td>
                <td> <?= date("d/m/Y", strtotime($reg['fecha_realizacion'])) ?> </td>
                <td> <?= $reg['anotaciones_anteriores'] ?> </td>
                <td> <?= $reg['anotaciones_posteriores'] ?> </td>
                <td>
                    <?php
                    session_start();
                    if ($_SESSION['admin']) {
                        ?>
                        <button type="button" onclick="window.location = 'EditarTarea.php?id=<?= $reg['id'] ?>'">
                            <img src="../../assets/imgs/editarTarea.jpg" height="20" width="20"> 
                        </button>
                        <button type="button" onclick="window.location = 'EliminarTarea.php?id=<?= $reg['id'] ?>'">
                            <img src="../../assets/imgs/eliminarTarea.jpg" height="20" width="20"> 
                        </button>
                    <?php } else { ?>
                        <button type="button" onclick="window.location = 'CompletarTarea.php?id=<?= $reg['id'] ?>'">
                            <img src="../../assets/imgs/completarTarea.png" height="20" width="20"> 
                        </button>
                    <?php } ?>
                </td>
            </tr>
            <?php
        endforeach;
        ?>
    </table>
</body>
</html>