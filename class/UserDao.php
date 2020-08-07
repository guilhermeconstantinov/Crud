<?php
    require_once 'Connect.php';
    class UserDao{

         public function create(User $user){
             $sql = "INSERT INTO usuarios_sistemas(nome,login,senha,admin) values()";
             $stmt = Connect::Connect()->prepare($sql);

         }

         public function read(){

         }

         public function update(){

         }

        public function delete(){

        }
    }