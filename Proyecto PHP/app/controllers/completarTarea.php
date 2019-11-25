<?php

include '../models/funciones.php';
return completarTarea($_POST['id'],
                $_POST['estado'],
                $_POST['anotaciones_anteriores'],
                $_POST['anotaciones_posteriores']);

       