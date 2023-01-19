<?php
require_once('autoload.php');

class insertar{
    private $miconexion;

    public function __construct(){
        $this->miconexion = new conexion();
        $this->miconexion = $this->miconexion->AbrirConexion();
    }

    public function inserta(String $nombre, int $edad, String $correo){
        $sql = "INSERT INTO Datos(nombre, edad, correo) VALUES (:nombre,:edad,:correo)";
        $consulta = $this->miconexion->prepare($sql);
        $consulta->BindValue(":nombre",$nombre);
        $consulta->BindValue(":edad",$edad);
        $consulta->BindValue(":correo",$correo);
        $resultado = $consulta->execute();
        return json_encode($resultado);
    }
}
?>
