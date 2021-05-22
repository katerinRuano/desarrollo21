<?php
class UsuariosController extends Controller {
  
    public function __construct($param1, $param2){
        
        parent:: __construct($param1,$param2);
        
    }
    public function login(){
        if (!(isset($_POST["user"])) || !(isset($_POST["pass"]))) {
            new ErroresController("Parametros username y password son necesarios");
        } else {
           if ($registro=$this->user->validarLogin($_POST["user"], $_POST["pass"])){
               $info=array('success'=>true, 'msg'=>'Usuario y password Son Correctos', 'token'=>$registro["token"]);
           }else {    
                $info=array('success'=>false, 'msg'=>'Usuario o password incorrecto');

           }
        }
        echo json_encode($info);
    }

   
}