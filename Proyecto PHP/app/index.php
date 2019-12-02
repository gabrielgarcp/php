<html>
    <head>
        <meta charset="UTF-8">
        <title>Inicio de sesión</title>
    </head>
    <body>
        <h1>Bienvenidos a Paco's garden s.l</h1>
        <h3>Inicie sesión</h3>
        <?php if (!$_POST) { ?>
            <form method="POST">
                <p><label>Usuario <br><input type="text" name="user" id="user" required/></label></p>
                <p><label>Clave <br><input type="password" name="pass" id="pass" required/></label></p>
                <input type="submit" name="ent" value="Entrar"/>
            </form>
            <?php
        } else {
            include 'models/Conexionbd.php';
            include 'objects/users.php';
            $usuario = new User($_POST['user'], $_POST['pass']);
            if ($usuario->usuarioExiste($usuario->user)) {

                if ($usuario->passOK($usuario->user, $usuario->pass)) {

                    if ($usuario->isAdmin($usuario->user)) {
                        session_start();
                        $_SESSION['admin'] = true;
                        header('Location: controllers/menu.php');
                    } else {
                        session_start();
                        $_SESSION['admin'] = false;
                        header('Location: controllers/menu.php');
                    }
                } else {
                    print 'Contraseña incorrecta';
                }
            } else {
                print 'No existe';
            }
        }
        ?>
    </body>
</html>