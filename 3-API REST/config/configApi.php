<?php

class ConfigApi
{
    public static $RESOURCE = 'resource';
    public static $PARAMS = 'params';
    public static $RESOURCES = [
      'centrosSalud#GET'=> 'apiController#getCentrosSalud',
      'lotesDisponibles#GET'=> 'apiController#getCentrosSalud',

    ];

}

 ?>
