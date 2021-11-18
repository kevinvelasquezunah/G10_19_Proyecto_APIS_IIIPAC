<?php
//Métodos CRUD
class Ma_socios_negocio extends Conectar{

    public function get_socios_negocio(){
        $conectar=parent :: Conexion();
        parent::set_names();
        $sql="SELECT * FROM ma_socios_negocio WHERE ESTADO=1";
        $sql=$conectar->prepare($sql);
        $sql->execute();
        return $Resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }
    public function get_Socio($ID_SOCIO){
        $conectar=parent :: conexion();
        parent::set_names();
        $sql="SELECT * FROM ma_socios_negocio WHERE estado=1 AND id_socio= ?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$ID_SOCIO);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert_socio($ID_SOCIO,$NOMBRE,$RAZON_SOCIAL,
    $DIRECCION,$TIPO_SOCIO,$CONTACTO,$EMAIL,$FECHA_CREADO,$ESTADO,$TELEFONO){
        $conectar=parent :: conexion();
        parent::set_names();
        $sql="INSERT INTO ma_socios_negocio(ID_SOCIO,NOMBRE,RAZON_SOCIAL,
        DIRECCION,TIPO_SOCIO,CONTACTO,EMAIL,FECHA_CREADO,ESTADO,TELEFONO) 
        VALUES(?,?,?,?,?,?,?,?,?,?);";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$ID_SOCIO);
        $sql->bindValue(2,$NOMBRE);
        $sql->bindValue(3,$RAZON_SOCIAL);
        $sql->bindValue(4,$DIRECCION);
        $sql->bindValue(5,$TIPO_SOCIO);
        $sql->bindValue(6,$CONTACTO);
        $sql->bindValue(7,$EMAIL);
        $sql->bindValue(8,$FECHA_CREADO);
        $sql->bindValue(9,$ESTADO);
        $sql->bindValue(10,$TELEFONO);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function Delete_socios_negocio($ID_SOCIO){
        $conectar=parent :: conexion();
        parent::set_names();
        $sql="DELETE FROM ma_socios_negocio WHERE ID_SOCIO = ?;";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$ID_SOCIO);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function UpdateSocios($NOMBRE,$RAZON_SOCIAL,
    $DIRECCION,$TIPO_SOCIO,$CONTACTO,$EMAIL,$FECHA_CREADO,$ESTADO,$TELEFONO,$ID_SOCIO){
        $conectar=parent :: conexion();
        parent::set_names();
        $sql="UPDATE ma_socios_negocio SET
        NOMBRE = ?,
        RAZON_SOCIAL = ?,
        DIRECCION = ?,
        TIPO_SOCIO = ?,
        CONTACTO = ?,
        EMAIL = ?,
        FECHA_CREADO = ?,
        ESTADO = ?,
        TELEFONO = ?
        WHERE ID_SOCIO = ?;";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$NOMBRE);
        $sql->bindValue(2,$RAZON_SOCIAL);
        $sql->bindValue(3,$DIRECCION);
        $sql->bindValue(4,$TIPO_SOCIO);
        $sql->bindValue(5,$CONTACTO);
        $sql->bindValue(6,$EMAIL);
        $sql->bindValue(7,$FECHA_CREADO);
        $sql->bindValue(8,$ESTADO);
        $sql->bindValue(9,$TELEFONO);
        $sql->bindValue(10,$ID_SOCIO);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

    }
    
}

?>