<?php

require_once "api.php";
require_once "./model/finalModel.php";//SUPONIENDO QUE EL MODEL ESTA IMPLEMENTADO
require_once "./controller/SecuredController.php";

class ApiController extends Api{
    private $model;
    function __construct(){
      parent::__construct();
      $this->model = new finalModel();
    }
  
    function getCentrosSalud($param=null){
      if (isset($param)){
        $id_ciudad = $param[0];
        $arreglo=$this->model->getCentrosSalud($id_ciudad);//trae todos los centros de salud que sean de la ciudad que tenga id_ciudad
        $datos=$arreglo;
      }else {
        $datos = $this->model->getCentrosSalud();
      }
      if (isset($datos)) {
        return $this->json_response($datos,200);
      }else{
        return $this->json_response(null,404);
      }
    }

    function getLotesDisponibles($param=null){
        if (isset($param)){
          $id_ciudad = $param[0];
          $arreglo=$this->model->getCentrosSalud($id_ciudad);//trae todos los centros de salud que sean de la ciudad que tenga id_ciudad
          foreach ($arreglo as &$centro){
                $lotes = $this->model->getLotesCiudad($loc['id']); //trae todos los lotes que tenga id_ciudad
                if(count($lotes)>0){
                    foreach ($lotes as &$lote){
                        if(lote['asignado']==true){
                            $lista = array(
                                "nombreCiudad" => $loc['nombre'],
                                "cantidadLotes" => count($lotes),
                                "listaLotes" => $lotes,
                                );
                        }   
                    }
                    
                }
            }
        }
        if (isset($lista)) {
          return $this->json_response($lista,200);
        }else{
          return $this->json_response(null,404);
        }
      }

?>