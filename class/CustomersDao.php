<?php
require_once 'Connect.php';
class CustomersDao{
    public function readCustomers($cnpj){

        $sql = "SELECT * FROM empresa where cnpj_emp = ?";
        $stmt =  Connect::Conn()->prepare($sql);
        $stmt->bindValue(1, $cnpj);
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
