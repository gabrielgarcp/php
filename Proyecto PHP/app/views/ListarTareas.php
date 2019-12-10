<html>
    <head>
        <meta charset="UTF-8">
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">        
        <title>Inicio de sesión</title>
    </head>
    <body> 
        <button type="button" onclick="window.location = '../controllers/BuscarTareas.php'"> Buscar </button>
        <button onclick="location.href = 'AnadirTarea.php'"> Añadir una tarea </button>

    </p>
    <table class="table" style="text-align: center;font-size: 12px">
        <thead class="thead-dark">
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
        </thead>
        <?php
        foreach ($tareas as $reg):
            ?>
            <thbody>
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
            </thbody>

            <?php
        endforeach;
        ?>
    </table>

    <div class="container my-5" >
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item <?php if ($_GET['pagina'] == 1) { ?> disabled <?php } ?>"><a class="page-link" href="./Listar.php?pagina=1 ?>"><<</a></li>
                <li class="page-item <?php if ($_GET['pagina'] == 1) { ?> disabled <?php } ?>"><a class="page-link" href="./Listar.php?pagina=<?= $_GET['pagina'] - 1 ?>"><</a></li>
                <?php for ($i = 1; $i <= $paginacion['paginas']; $i++) { ?>
                    <li class="page-item <?php if ($_GET['pagina'] == $i) { ?> active <?php } ?>" active><a class="page-link"  href="./Listar.php?pagina=<?= $i ?>"><?= $i ?></a></li>
                <?php }
                ?>
                <li class="page-item <?php if ($_GET['pagina'] == $paginacion['paginas']) { ?> disabled <?php } ?>"><a class="page-link" href="./Listar.php?pagina=<?= $_GET['pagina'] + 1 ?>">></a></li>
                <li class="page-item <?php if ($_GET['pagina'] == $paginacion['paginas']) { ?> disabled <?php } ?>"><a class="page-link" href="./Listar.php?pagina=<?= $paginas ?>">>></a></li>
            </ul>
        </nav>
    </div>
</body>
</html>