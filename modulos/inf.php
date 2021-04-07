<?php
include("header.php");
include("../configs/conexion.php");

session_start();
if(!isset($_SESSION['user_id'])){
    header('Location: ../index.php');
    exit;
}
if(!($_SESSION['carrera'] == "informatica" && $_SESSION['rol'] == "estudiante")){
    header('Location: ../index.php');
}

//Seleccionador templates
$query = $connection->prepare("SELECT * FROM usuario WHERE ci =:ci");

$query->bindParam("ci", $_SESSION['user_id'], PDO::PARAM_STR);
$query->execute();

$result = $query->fetch(PDO::FETCH_ASSOC);

if($result['color'])
{
    $colorBack = $result['color'];
}
else{
    $colorBack = "yellow";
}

if (isset($_POST['colores'])) {
$colorBack = $_POST['color'];
$datos = [
    'color'=> $colorBack,
    'ci' => $_SESSION['user_id'],
];

$query = $connection->prepare("UPDATE usuario SET color=:color WHERE ci=:ci");
$query->execute($datos);
}
//


?>
<html>
<body>
<?php
echo '<div style="background-color:'.$colorBack.';">';
    ?>

    <h3>INFORMATICA</h3>
    </div>

    <select name = "color" form = "color-form">
        <option value="red">Rojo</option>
        <option value="green">Verde</option>
        <option value="blue">Azul</option>
    </select>

    <form id = "color-form" method = "post" action = "inf.php">
    <input type ="submit" name="colores" value="Cambiar color">
        
    </form>
<div>
    <table border = "1">
    <tr>
            <th>Materia</th>
            <th>Primer parcial</th>
            <th>Segundo parcial</th>
            <th>Examen final</th>
            <th>Total</th>
        </tr>
        <?php
$query = $connection->prepare("SELECT * FROM nota WHERE ci=:ci");
$query->execute(['ci'=>$_SESSION['user_id']]);
$resultado = $query->fetchAll();

    if($resultado>0){
        foreach($resultado as $row){
          print " " ."<tr>
                        <th>".$row['sigla']."</th>
                        <th>".$row['nota1']."</th>
                        <th>".$row['nota2']."</th>
                        <th>".$row['nota3']."</th>
                        <th>".$row['notafinal']."</th>
                    </tr>";
        }
    }
?>
    </table>
    </div>
    <button class = "buton" type = "button" onclick="window.location.href='../index.php';">Volver a la pagina principal</button>
<button class = "buton" type = "button" onclick="window.location.href='salir.php';">Salir</button>

</body>
</html>
