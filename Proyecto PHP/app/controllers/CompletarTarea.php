<?php
if (!$_POST) {
    include '../views/CompletarTarea.php';
} else {
    include '../models/funciones.php';
    $result_completar = completarTarea($_POST['id'],$_POST['estado'],$_POST['anotaciones_anteriores'],$_POST['anotaciones_posteriores']);
    
    ?>
<script type="text/javascript">
    alert("<?= $result_completar ?>");
    window.location.href = "Listar.php";
</script>
<?php }

       