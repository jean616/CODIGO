<?php
use App\controladores\ControladorUsuario as ControladorUsuario; 
include_once "includes/autoload.php";
session_start();


$request = $_SERVER['QUERY_STRING'];

switch ($request){
    case "bienvenido":
        include_once "App/vistas/bienvenido.php";
        break;
    case "crear-usuarios":
        include_once "App/vistas/uCrear.php";
        break;
    case "crear-plan-estudios":
        include_once "App/vistas/planCrear.php";
        break;
    case "asignar-cursos":
        include_once "App/vistas/cursosAsignar.php";
        break;
    case "login":
        include_once "App/vistas/uLogin.php";
        break;
    case "guardar-usuario":
        include_once "App/vistas/uCrear.php";
        break;
    case "validar":
        $codigo = $_POST["codigo"];
        $controladorUsuario=new ControladorUsuario();
        $controladorUsuario->validar($codigo);
        break;
    case "api/estudiantes":
        $metodo = $_SERVER["REQUEST_METHOD"];
        $controladorUsuario = new ControladorUsuario();


        if($metodo == "GET"){ 
                $resultados=$controladorUsuario->mostrarEstudiantes();
                $estudiantes[]=null;
                foreach ($resultados as $key => $estudiantes) {
                $estudiantes[$key] = array(
                                        "nombres"=>$estudiantes["nombres"],
                                        "apellidos"=>$estudiantes["apellidos"]
                                    );
                }
                echo json_encode($estudiantes);
            }    
            if($metodo == "POST"){
                $nombre = $_POST["nombres"];
                $apellidos =$_POST["apellidos"] ;
                $codigo = (int)$_POST["codigo"];
                $password=$_POST["password"];
                $tipo=$_POST["tipo"];
                $resultado = $controladorUsuario->crearUsuario($nombres,$apellidos,$codigo,$password,$tipo);
                if($resultado == "Guardado"){
                     echo  json_encode(array(
                        "codigo"=>"200",
                        "status"=>"ok"
                    ));
                }
                else{
                    echo  json_encode(array(
                        "codigo"=>"500",
                        "status"=>"error"
                    ));
                }
            } 
    
        break;
    default:
        include_once "App/vistas/uLogin.php";
        break;
}