<center>

<form method = "post" action="">

<div>
<label><h2>Iniciar sesion</h2></label>

<div class = "form-element">
<input type = "text" placeholder = "Usuario" name = "usuario"/>
</div>

<div class = "form-element">
<input type = "password" placeholder = "Password" name = "password"/>
</div>

<div class = "form-element">
<select name = "carreras">
            <option value = "">Seleccione su carrera</option>
            <option value = "1">INFORMATICA</option>
            <option value = "2">MATEMATICA</option>
            <option value = "3">ESTADISTICA</option>
</select>
</div>

<div class = "form-element">
<button name = "enviar" type = "submit">Ingresar</button>
</div>


</div>
</form>
</center>
<?php
session_start();

include('../configs/conexion.php');
if (isset($_POST['enviar'])) {
    $username = $_POST['usuario'];
    $password = $_POST['password'];
    $carrera = $_POST['carreras'];

    $query = $connection->prepare("SELECT * FROM usuario WHERE usuario=:usuario");
    $query->bindParam("usuario", $username, PDO::PARAM_STR);
    $query->execute();

    $result = $query->fetch(PDO::FETCH_ASSOC);
    if (!$result) {
        echo '<p class="error">Username password combination is wrong!</p>';
    } else {
        if ($password == $result['password']) {
            $_SESSION['user_id'] = $result['ci'];
            $_SESSION['rol'] = $result['rol'];
            $_SESSION['carrera'] = $result['carrera'];

            if($result['rol'] === "docente"){
                header('Location:docente.php');
                exit;
            }

            switch ($carrera) {
                case "1":
                    header('Location:inf.php');
                    exit;
                    break;
                case "2":
                    header('Location:mat.php');
                    exit;
                    break;
                case "3":
                    header('Location:est.php');
                    exit;
                    break;
                    
                default:
                    header('Location: ../index.php');
                    exit;
                    break;
            
        }
           
        } else {
            echo '<p class="error">Username password combination is wrong!</p>';
    
        }

    }
}

?>

