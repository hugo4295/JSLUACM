<?php
require_once("src/inserta.php");
require_once("src/Listar.php");
require_once("src/Actualizar.php");
require_once("src/Eliminar.php");

$method = $_SERVER['REQUEST_METHOD'];

if($method == 'GET'){
    if (isset($_GET["id"])){
        $id=$_GET["id"];
        $consultaid = new Listar();
        echo $consultaid->listaID($id);
    } else {
        $consultartodos = new Listar();
        echo $consultartodos->listatodos();
    }
    header("HTTP/1.1 200 Ok");
    exit;
}
if($method == 'POST'){
    $insertamos = new insertar();
    $argumentos = $_POST;
    echo $insertamos->inserta($argumentos["nombre"],$argumentos["edad"],$argumentos["correo"]);
    header("HTTP/1.1 200 Ok");
    exit;
}
if($method == 'PUT'){
    $actualiza = new Actualizar();
    parse_str(file_get_contents("php://input"),$put_vars);
    $argumentos = $put_vars;
    echo $actualiza->actualiza($argumentos["id"],$argumentos["nombre"],$argumentos["edad"],$argumentos["correo"]);
    header("HTTP/1.1 200 Ok");
    exit;
}
if($method == 'DELETE'){
    $elimina = new Eliminar();
    parse_str(file_get_contents("php://input"),$del_vars);
    $argumentos = $del_vars;
    echo $elimina->elimina($argumentos["id"]);
    header("HTTP/1.1 200 Ok");
    exit;
}

?>
