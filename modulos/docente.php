<?php
include("header.php");
include("../configs/conexion.php");

session_start();
if(!isset($_SESSION['user_id'])){
    header('Location: ../index.php');
    exit;
}
if(!($_SESSION['rol'] === "docente")){
    header('Location: ../index.php');
}

$rol = $_SESSION['rol'];
$carrera = $_SESSION['carrera'];

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
    <h3>BIENVENIDO DOCENTE DE <?php echo $carrera?></h3>
    </div>


<table border = "1">
<?php
$query = $connection->prepare("SELECT p.departamento dep FROM persona p, usuario u WHERE p.ci = u.ci and u.rol = 'estudiante' GROUP BY p.departamento");

$query->execute(['ci'=>$_SESSION['user_id']]);
$resultado = $query->fetchAll();

$query2 = $connection->prepare("SELECT n.sigla materia, round(avg(n.notafinal),1) promedio, p.departamento departamento
from nota n, usuario u, persona p
where p.ci = u.ci and u.ci = n.ci
group by n.sigla, p.departamento");

$query2->execute(['ci'=>$_SESSION['user_id']]);
$resultado2 = $query2->fetchAll();


if($resultado>0){
    print " "."<tr>";
    foreach($resultado as $row){
    print " "."<td><table>"; 
      print " " ."<th>".$row['dep'];

                if($resultado2>0){
                    foreach($resultado2 as $row2){
                    if($row['dep'] == $row2['departamento'])
                    print " " ."<tr>
                                    <td>".$row2['materia']."</td>
                                    <td>".$row2['promedio']."</td>
                                </tr>";
                    }
                }
                print " "."</th>";  
    print " "."</table></td>";                  
    }
    print " "."</tr>";
    
}

?>
    </table>
    <button class = "buton" type = "button" onclick="window.location.href='../index.php';">Volver a la pagina principal</button>
    <button class = "buton" type = "button" onclick="window.location.href='salir.php';">Salir</button>

</body>
</html>
