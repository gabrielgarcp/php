<html>
    <head>
        <meta charset="UTF-8">
        <title>Buscar tarea</title>
    </head>
    <body>
        <form method="POST">
            <p>
                <label>Poblacion:
                    <select name="poblacion">
                        <option value="LIKE" <?php if (!empty($errores_buscar) && $d_buscar['poblacion'] === "LIKE") { ?> selected <?php } ?>>Empieza por </option>
                        <option value="=" <?php if (!empty($errores_buscar) && $d_buscar['poblacion'] === "=") { ?> selected <?php } ?>> Igual que </option>
                        <option value="<>" <?php if (!empty($errores_buscar) && $d_buscar['poblacion'] === "<>") { ?> selected <?php } ?>>Distinta de </option>
                    </select>
                    <input type="text" name="text_poblacion" value="<?php if (!empty($errores_buscar)) { ?><?= $d_buscar['text_poblacion'] ?><?php } ?>"/>
                </label>
            </p>
            <p>
                <label>Fecha de creacion:
                    <select name="fech_creacion">
                        <option value="<" <?php if (!empty($errores_buscar) && $d_buscar['fech_creacion'] === "<") { ?> selected <?php } ?>>Anteriores de</option>
                        <option value="="  <?php if (!empty($errores_buscar) && $d_buscar['fech_creacion'] === "=") { ?> selected <?php } ?>>En el dia </option>
                        <option value=">"  <?php if (!empty($errores_buscar) && $d_buscar['fech_creacion'] === ">") { ?> selected <?php } ?>>Después de </option>
                    </select>
                    <input type="date" name="text_fecha" value="<?php if (!empty($errores_buscar)) { ?><?= $d_buscar['text_fecha'] ?><?php } ?>"/>
                </label>
            </p>
            <p>
                <label> Operario encargado:
                    <select name="operario">
                       <option value="LIKE" <?php if (!empty($errores_buscar) && $d_buscar['operario'] === "LIKE") { ?> selected <?php } ?>>Empieza por </option>
                        <option value="=" <?php if (!empty($errores_buscar) && $d_buscar['operario'] === "=") { ?> selected <?php } ?>> Igual que </option>
                        <option value="<>" <?php if (!empty($errores_buscar) && $d_buscar['operario'] === "<>") { ?> selected <?php } ?>>Distinto de </option>
                    </select>
                    <input type="text" name="text_operario" value="<?php if (!empty($errores_buscar)) { ?><?= $d_buscar['text_operario'] ?><?php } ?>"/>
                </label>
            </p>
            <input type="submit" name="buscar" value="Buscar"/>
                <?php
                if (!empty($errores_buscar)) {
                    foreach ($errores_buscar as $error) {
                        ?>
                        <p style="color:red"> <?= $error ?> </p>
                        <?php
                    }
                }
                ?>
        </form>
    </body>
</html>

