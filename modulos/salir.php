<?php
session_start();
unset($_SESSION['user_id']);
unset($_SESSION['rol']);
unset($_SESSION['carrera']);
session_destroy();
header('Location:../index.php');
?>