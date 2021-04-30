<?php

include_once('Objetos.php');
require_once("Objetos.php");
$maquina = unserialize($_SESSION['maquina']);

if($maquina->getPrimer() && $maquina->mode == "jugador"){
    $maquina->mostrarFormInicial();
}else{
    if($maquina->mode == "jugador"){
        $maquina->paso($_GET['num']);    
    }else{
        $maquina->puntoMedio();
    }
}
$_SESSION['maquina'] = serialize($maquina);

?>


