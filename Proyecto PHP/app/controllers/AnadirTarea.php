<?php
include '../models/funciones.php';
if(!isset($_POST['Anadir'])){
    include '../views/AnadirTarea.php';
}else{
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
}