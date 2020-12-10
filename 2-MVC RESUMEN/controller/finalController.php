<?php
require_once  "./view/finalController.php";
require_once  "./model/finalModel.php";
    class finalController{
        private $view;
        private $model;
        private $Titulo;

        function __construct()
        {
        parent::__construct();
        $this->view = new finalView();
        $this->model = new finalModel();
        $this->Titulo = "Ministerio de Salud";
        }

    }

    private function listarLotesPorCiudad(){
        $localizacion = $this->model->getCiudades();
        foreach ($localizacion as &$loc){
            $lotes = $this->model->getLotesCiudad($loc['id']);
            if(count($lotes)>0){
                $lista = array(
                    "nombreCiudad" => $loc['nombre'],
                    "cantidadLotes" => count($lotes),
                    "listaLotes" => $lotes,
                    );
            }
        }
        return $lista;
    }

    function mostrarMain(){
        $lista = $this->listarLotesPorCiudad();
        $this->view->mostrarMain($Titulo,$lista);
    }
?>