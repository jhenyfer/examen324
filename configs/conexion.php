<?php

$host_mysql = "localhost";
$user_mysql = "root";
$pass_mysql = "";
$db_mysql = "mibase";

mysql_connect($host_mysql, $user_mysql, $pass_mysql) or die ("Error al conectar con servidor mysql");
mysql_select_db($db_mysql) or die ("Error conectando a la base de datos");

try {
    $connection = new PDO("mysql:host=$host_mysql;dbname=$db_mysql", $user_mysql, $pass_mysql);
   
} catch (PDOException $e) {
    exit("Error: " . $e->getMessage());
}

?>