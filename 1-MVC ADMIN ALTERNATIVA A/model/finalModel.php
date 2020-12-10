<?php
class finalModel
{
  private $db;

  function __construct()
  {
    $this->db = $this->Connect();
  }

  function Connect(){
    return new PDO('mysql:host=localhost;'
    .'dbname=sistema;charset=utf8'
    , 'root', '');
  }

  function getCiudad($id){
      $sentencia = $this->db->prepare("SELECT * FROM Ciudad where id_ciudad=?");
      $sentencia->execute(array($id));
        return $sentencia->fetch(PDO::FETCH_ASSOC); 
  }

    function getLotes(){
        $sentencia = $this->db->prepare("SELECT * FROM Lote");
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_ASSOC); 
    }

  function getLaboratorio($id){
    $sentencia = $this->db->prepare("SELECT * FROM Laboratorio where id_laboratorio=?");
    $sentencia->execute(array($id));
      return $sentencia->fetch(PDO::FETCH_ASSOC); 
}

    function addLote($idCiudad,$idLab,$fecha_vto,$nro_lote)){
        $sentencia = $this->db->prepare("INSERT into lote(id_ciudad,id_laboratorio,año_vencimiento,nro_lote) VALUES(?.?,?,?)");
        $sentencia->execute(array($idCiudad,$idLab,$fecha_vto,$nro_lote));
    }

  
}
?>

