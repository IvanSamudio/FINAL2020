<?php
require_once  "./view/finalController.php";
require_once  "./model/finalModel.php";
require_once  "securedController.php";
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

    function addLote(){
        $nro_lote=$_POST['nroLote'];
        $fecha_vto=$_POST['fechaVto'];
        $id_ciudad=$_POST['idCiudad'];
        $id_laboratorio=$_POST['idLab'];
        $ciudad = $this->model->getCiudad($id_ciudad);
        $laboratorio = $this->model->getLaboratorio($id_laboratorio);
        if(is_int($id_ciudad)&&is_int($fecha_vto)&&is_int($id_laboratorio)&&is_string($nro_lote)){
            if(isset($_SESSION["User"])){
                if($ciudad!=null && $laboratorio!=null && $_SESSION["User"] == "administrador"){
                    $this->model->addLote($id_ciudad,$id_laboratorio,$fecha_vto,$nro_lote);
                    if($laboratorio['stock_lotes']>0){
                        $this->model->updateStock($id_laboratorio,$laboratorio['stock_lotes']+1);
                    }
                }
            }  
        }
    }

    function mostrarMain(){
        $lotes=$this->model->getLotes();
        $this->view->mostrarMain($Titulo,$lotes);
    }
?>