<?php
require_once("Objetos.php");
session_start();
$_SESSION['maquina'] = serialize(new Maquina($_POST["nivel"], $_POST["modalidad"]));
header('Location: ./juego.php');
?>


