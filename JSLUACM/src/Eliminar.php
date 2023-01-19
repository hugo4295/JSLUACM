<?php
require_once('autoload.php');

class Eliminar{
    private $miconexion;

    public function __construct(){
        $this->miconexion = new conexion();
        $this->miconexion = $this->miconexion->AbrirConexion();
    }

    public function elimina(int $id){
        $sql = "delete from Datos where id =:id";
        $consulta = $this->miconexion->prepare($sql);
        $consulta->BindValue(":id",$id);
        $resultado = $consulta->execute();
        return json_encode($resultado);
    }
}
?>
