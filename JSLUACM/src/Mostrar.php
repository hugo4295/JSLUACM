<?php
require_once('autoload.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Informacion</title>
</head>
<body>

<?php
class Mostrar extends conexion{
    private $miconexion;

    public function __construct(){
        $this->miconexion = new conexion();
        $this->miconexion = $this->miconexion->AbrirConexion();
    }

    public function listatodos(){
        $sql="select * from Datos";
        $consulta = $this->miconexion->prepare($sql);
        $consulta->execute();
        $registro = $consulta->fetchAll(PDO::FETCH_ASSOC);
        return json_encode($registro);       
    }
}

$consultartodos = new Mostrar();

$datos1 = json_decode($consultartodos->listatodos());

?>   
<table class="table">
    <thead>
        <th>Id</th>
        <th>Nombre</th>
        <th>Edad</th>
        <th>Correo</th>
        <th colspan="2">Acciones</th>
    </thead>
    <tbody>
        <?php
        foreach($datos1 as $dato){
            echo "<tr>";
            echo "<td>".$dato->id."</td>";
            echo "<td>".$dato->nombre."</td>";
            echo "<td>".$dato->edad."</td>";
            echo "<td>".$dato->correo."</td>";
            echo "<td><a href=\"actualizacion.php?id=".$dato->id."\">Editar</a></td>";
            echo "<td><a href=\"eliminar.php?id=".$dato->id."\">Eliminar</a></td>";
            echo "</tr>";        
        }
        ?>
    </tbody>
</table>
</body>
</html>
