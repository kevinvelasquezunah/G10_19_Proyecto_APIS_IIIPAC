<?php
//Codigo compartido en clase por el lic.
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
  header('Access-Control-Allow-Origin: *');
  header('Access-Control-Allow-Methods: POST, GET, DELETE, PUT, PATCH, OPTIONS');
  header('Access-Control-Allow-Headers: token, Content-Type');
  header('Access-Control-Max-Age: 1728000');
  header('Content-Length: 0');
  header('Content-Type: text/plain');
  die();
}
  header('Access-Control-Allow-Origin: *');  
  header('Content-Type: application/json');

// Case según método elegido
require_once("../config/conexion.php");
require_once("../models/Ma_Socios_Negocio.php");
$ma_socios_negocio = new  Ma_socios_negocio();
$body=json_decode(file_get_contents("php://input"),true);
switch ($_GET["op"]){

    case "Getsocios_negocios":
        $datos=$ma_socios_negocio->get_socios_negocio();
        echo json_encode($datos);
    break;

    case "GetSocioID":
        $datos=$ma_socios_negocio->get_Socio($body["ID_SOCIO"]);
        echo json_encode($datos);
    break;

    case "Insertsocios_negocio":
      $datos=$ma_socios_negocio->insert_socio($body["ID_SOCIO"],$body["NOMBRE"],$body["RAZON_SOCIAL"],
      $body["DIRECCION"],$body["TIPO_SOCIO"],$body["CONTACTO"],$body["EMAIL"],$body["FECHA_CREADO"],$body["ESTADO"],$body["TELEFONO"]);
      echo json_encode("Datos Insertados");
    break;

    case "EliminarSocios":
        $datos=$ma_socios_negocio->Delete_socios_negocio($body["ID_SOCIO"]);
        echo json_encode("Datos Eliminados");
      break;

      case "UpdateSocios":
        $datos=$ma_socios_negocio->UpdateSocios($body["NOMBRE"],$body["RAZON_SOCIAL"],
        $body["DIRECCION"],$body["TIPO_SOCIO"],$body["CONTACTO"],$body["EMAIL"],$body["FECHA_CREADO"],$body["ESTADO"],$body["TELEFONO"], $body["ID_SOCIO"]);
        echo json_encode("Datos Actualizados");
      break;
}
?>