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
                    session_start();
                    $_SESSION['usuario'] = strtolower($usuario->user);
                    if ($usuario->isAdmin($usuario->user)) {
                        $_SESSION['admin'] = true;
                        header('Location: controllers/Listar.php');
                    } else {
                        $_SESSION['admin'] = false;
                        header('Location: controllers/Listar.php');
                    }
                } else {
                    ?>
                    <script type="text/javascript">
                        alert("Contraseña incorrecta");
                        window.location.href = "index.php";
                    </script>
                    <?php
                }
            } else {
                ?>
                <script type="text/javascript">
                    alert("Este usuario no existe");
                    window.location.href = "index.php";
                </script>
                <?php
            }
        }
        ?>
    </body>
</html>