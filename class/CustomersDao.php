<?php
require_once 'Connect.php';
class CustomersDao{
    public function readCompany($cnpj){

        $sql = "select * from empresa join endereco on empresa.id_emp = endereco.id_emp having empresa.cnpj_emp = ?";
        $stmt =  Connect::Conn()->prepare($sql);
        $stmt->bindValue(1, $cnpj);
        $stmt->execute();
        if($stmt->rowCount()>0){
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        return 0;
    }

    public function readCar($placa){

        $sql = "select * from clientes join carros on clientes.id_c = carros.id_c having carros.placa = ?";
        $stmt =  Connect::Conn()->prepare($sql);
        $stmt->bindValue(1, $placa);
        $stmt->execute();
        if($stmt->rowCount()>0){
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        return 0;
    }

    public function readAll(){

        $sql = "SELECT * FROM empresa";
        $stmt =  Connect::Conn()->prepare($sql);
        $stmt->execute();
        if($stmt->rowCount()>0){
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        return 0;
    }
}
