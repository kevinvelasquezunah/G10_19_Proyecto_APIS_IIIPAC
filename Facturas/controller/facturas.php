<?php

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
header('Content-Type:application&json');


    require_once("../../config/conexion.php");
    require_once("../../Facturas/models/Facturas.php");
    $facturas = new Facturas();

    $body=json_decode(file_get_contents("php://input"),TRUE);

    switch($_GET["op"]){
        case "GetFacturas":
            $datos=$facturas->get_facturas();
            echo json_encode($datos);
        break;

        case "GetUno":
            $datos=$facturas->get_factura($body["id"]);
            echo json_encode($datos);
        break;

        case "InsertFacturas":
            $datos=$facturas->insert_factura($body["ID"],$body["NUMERO_FACTURA"],$body["ID_SOCIO"],$body["FECHA_FACTURA"],$body["DETALLE"],$body["SUB_TOTAL"],$body["TOTAL_ISV"],$body["TOTAL"],$body["FECHA_VENCIMIENTO"],$body["ESTADO"]);
            echo json_encode("Factura Agregada");
        break;

        case "EliminarFacturas":
            $datos=$facturas->delete_factura($body["id"]);
            echo json_encode("Pedidos Eliminados");
        break;
    
          case "UpdateFacturas":
            $datos=$facturas->update_factura($body["ID"],$body["NUMERO_FACTURA"],$body["ID_SOCIO"],$body["FECHA_FACTURA"],$body["DETALLE"],$body["SUB_TOTAL"],$body["TOTAL_ISV"],$body["TOTAL"],$body["FECHA_VENCIMIENTO"],$body["ESTADO"]);
            echo json_encode("Factura Actualizada");
        break;

       

            
    }


?>