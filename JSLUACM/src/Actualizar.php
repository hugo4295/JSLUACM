<?php
require_once('autoload.php');

class Actualizar{
    private $miconexion;

    public function __construct(){
        $this->miconexion = new conexion();
        $this->miconexion = $this->miconexion->AbrirConexion();
    }

    public function actualiza(int $id, String $nombre, int $edad, String $correo){
        $sql = "update Datos set nombre=:nombre , edad=:edad, correo=:correo where id =:id";
        $consulta = $this->miconexion->prepare($sql);
        $consulta->BindValue(":id",$id);
        $consulta->BindValue(":nombre",$nombre);
        $consulta->BindValue(":edad",$edad);
        $consulta->BindValue(":correo",$correo);
        $resultado = $consulta->execute();
        return json_encode($resultado);
    }
}
?>
