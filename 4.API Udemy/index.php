<?php
    require_once "controladores/plantilla.controlador.php";
    require_once "controladores/categorias.controlador.php";

    require_once "modelos/categorias.modelo.php";
    
    $plantilla = new ControladorPlantilla();
    $plantilla->ctrPlantilla(); 

?>