<?php

include("configs/conexion.php");

?>
<html>
<head>
    <title>Facultad de Ciencias Puras y Naturales</title>
</head>
<body>
    <header>
        <h1>Facultad de Ciencias Puras y Naturales</h1>
        <h3>Bienvenido, ingrese sesion para verficar sus notas.</h3>
    </header>
<?php

session_start();

if(!isset($_SESSION['user_id'])){
    echo '<button class = "buton" type = "button" onclick="window.location.href=\'modulos/login.php\';">Login</button>';
}
else{
    echo '<button class = "buton" type = "button" onclick="window.location.href=\'salir.php\';">Salir</button>';
}


?>
    <h3>Carreras:</h3>
    <ul>
        <li><a href = "modulos/inf.php">INFORMATICA</a></li>
        <li><a href = "modulos/mat.php">MATEMATICA</a></li>
        <li><a href = "modulos/est.php">ESTADISTICA</a></li>
        <li><a href = "?">FISICA</a></li>
        <li><a href = "?">QUIMICA</a></li>
        <li><a href = "?">BIOLOGIA</a></li><br>
        <li><a href = "modulos/docente.php">Docentes ingresar aqu&iacute;</a></li>

    </ul>
</body>
</html>

