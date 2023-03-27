<?php
//Traemos las consultas de la db
require_once("modelo/index.php");
class modeloController{
	private $model;
	function __construct(){
		//La conexion de la base de datos
        $this->model=new Modelo();
    }
    // MOSTRAR Registro
    static function index(){
    	$producto 	=	new Modelo();
		$dato=$producto->mostrar("productos","1");
		require_once("vista/index.php");
    }

    // INSERTAR
    static function nuevo(){
    	require_once("vista/nuevo.php");	    	    	
    }

    static function guardar(){
    	$nombre= $_REQUEST['nombre'];
    	$precio= $_REQUEST['precio'];
		//Cadena la cual se va insertar
        $data = "'{$nombre}', '{$precio}'";
    	$producto =	new Modelo();
		$dato =	$producto->insertar("productos",$data);
		//Si se inserta correctamente(redireccion)
		header("location:".urlsite);
    }

	    // EDITAR
	static function editar(){
		$id=$_REQUEST['id'];
		$producto =	new Modelo();
		$dato=$producto->mostrar("productos","id=".$id);    	
		require_once("vista/editar.php");
	}

//ACTUALIZAR
    static function actualizar(){
    	$id = $_REQUEST['id'];
    	$nombre =$_REQUEST['nombre'];
    	$precio =$_REQUEST['precio'];
        $data = "nombre='".$nombre."', precio=".$precio;
    	$producto = new Modelo();
		$dato =	$producto->actualizar("productos",$data,"id=".$id);
        header("location:".urlsite);
	}

    // ELIMINAR
	static function eliminar(){		
		$id = $_REQUEST['id'];
    	$producto =	new Modelo();        
		$dato =	$producto->eliminar("productos","id={$id}");
		header("location:".urlsite);
	}
}