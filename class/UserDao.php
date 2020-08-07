<?php
    require_once 'Connect.php';
    require_once 'User.php';
    class UserDao{

         public function create(User $user){
             $sql = "INSERT INTO usuarios_sistemas(nome,login,senha,admin) values(?,?)";
             $stmt = Connect::Connect()->prepare($sql);
             $stmt->bindValue(1,$this->)


         }

         public function read(){

         }

         public function update(){

         }

        public function delete(){

        }
    }