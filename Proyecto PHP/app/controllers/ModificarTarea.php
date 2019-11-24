<?php
        $estado=$_POST['estado'];   
        $anotaciones_antes=$_POST['anotaciones_antes'];
        $anotaciones_post=$_POST['anotaciones_post'];
        actualizarTarea($id_t, $estado, $anotaciones_antes, $anotaciones_post);
        header("Esta tarea ha sido modificada");

