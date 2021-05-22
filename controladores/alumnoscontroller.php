<?php
require "modelos/alumnos.php";
class AlumnosController extends Controller{
    private $alumnos;

    public function __construct($param1, $param2){
        $this->alumnos=new Alumnos();
        parent:: __construct($param1, $param2);
        
    }
    public function Agregar(){
        if(isset($_POST['nombre']) && isset($_POST['direccion']) && isset($_POST['telefono']) && isset($_POST['lab1']) && isset($_POST['lab2']) && isset($_POST['parcial'])){
            $this->alumnos->Agregar($_POST['nombre'], $_POST['direccion'], $_POST['telefono'], $_POST['lab1'], $_POST['lab2'], $_POST['parcial']);
            $info=array('sucess'=>true, 'msg'=>'El Alumno ha sido agregado con exito');

        } else {
            $info=array('sucess'=>false, 'msg'=>'Falta introducir algun parametro');

        }

        echo json_encode($info);
    }
    public function ObtenerTodos(){
            $info=array('success'=>true, 'data'=>$this->alumnos->ObtenerTodos());
             echo json_encode($info);
    }


}