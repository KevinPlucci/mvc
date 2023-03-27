<?php
require_once("config.php");
require_once("controlador/index.php");
//var_dump(urlsite); Me fijo si lee el url
//phpinfo(); informacion de la version de php que estoy usando
if(isset($_GET['m'])):
    if(method_exists("modeloController",$_GET['m'])):
        modeloController::{$_GET['m']}();
    endif;
else:
    modeloController::index();
endif;