<?php
class Modelo{
    private $Modelo;
    private $db;
    private $datos;
    public function __construct(){
        $this->Modelo = array();
        //En el mismo constructor usamos la conexion a la DB
        $this->db=new PDO('mysql:host=localhost;dbname=mvc',"root","");
    }
    //Creamos un metodo para insertar a la DB
    public function insertar($tabla, $data){
        $consulta= "insert into {$tabla} values(null,{$data})";     
        $resultado=$this->db->query($consulta);
        if ($resultado) {
            return true;
        }else {
            return false;
        }
     }
     //Idem muestreo
    public function mostrar($tabla,$condicion){
        $consul="select * from ".$tabla." where ".$condicion.";";
            $resu=$this->db->query($consul);
            while($filas = $resu->FETCHALL(PDO::FETCH_ASSOC)) {
                $this->datos[]=$filas;
            }
            return $this->datos;
        } 
    //Idem actualizo de regitro
    public function actualizar($tabla, $data, $condicion){       
        $consulta="update ".$tabla." set ". $data ." where ".$condicion;
        $resultado=$this->db->query($consulta);
        if ($resultado) {
            return true;
        }else {
            return false;
        }
     }
     //Idem elimino de regitro
    public function eliminar($tabla, $condicion){
        $eli="delete from ".$tabla." where ".$condicion;
        $res=$this->db->query($eli);
        if ($res) {
            return true; 
        }else {
            return false;
        }
    }
}