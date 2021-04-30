<?php

include_once 'DatabasePDO.php';
include_once 'DatabaseOOP.php';
include_once 'EstadistiquesRow.php';
include_once('Objetos.php');
require_once("Objetos.php");
session_start();
$maquina = unserialize($_SESSION['maquina']);

 $maquina->guardar();
 
header('Location: ./index.php');
?>