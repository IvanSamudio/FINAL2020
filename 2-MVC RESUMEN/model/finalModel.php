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

    function getLotesCiudad($id){
        $sentencia = $this->db->prepare("SELECT * FROM Lote where id_ciudad=?");
        $sentencia->execute(array($id));
        return $sentencia->fetchAll(PDO::FETCH_ASSOC); 
    }

    function getCiudades(){
      $sentencia = $this->db->prepare("SELECT * FROM Ciudad");
      $sentencia->execute();
      return $sentencia->fetchAll(PDO::FETCH_ASSOC); 
  }

  
}
?>

