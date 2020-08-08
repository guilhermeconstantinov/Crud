<?php
    require_once 'Connect.php';
    require_once 'User.php';
    class UserDao{

         public function create(User $user){
             $sql = "INSERT INTO usuarios_sistemas(nome,login,senha) values(?,?,?)";
             $stmt = Connect::Conn()->prepare($sql);
             $stmt->bindValue(1,$user->getName());
             $stmt->bindValue(2,$user->getLogin());
             $stmt->bindValue(3,$user->getPassword());
             $stmt->execute();
         }

         public function readAll(){
            $sql = "SELECT * FROM usuarios_sistemas where admin = '0'";
            $stmt =  Connect::Conn()->prepare($sql);
            $stmt->execute();

            if($stmt->rowCount()>0){
                  return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            return 0;
         }

         public function update(User $user){
             $sql = "Update usuarios_sistemas set nome = ?, senha = ?, admin = ? where id = ?";
             $stmt = Connect::Conn()->prepare($sql);
             $stmt->bindValue(1,$user->getName());
             $stmt->bindValue(2,$user->getPassword());
             $stmt->bindValue(3,$user->getAdmin());
             $stmt->bindValue(3,$user->getId());
             $stmt->execute();

         }

        public function delete($id){
            $sql = "DELETE * FROM usuarios_sistemas where id = ?";
            $stmt = Connect::Conn()->prepare($sql);
            $stmt->bindValue(1,$id);
            $stmt->execute();
        }
        public function login(User $user){
             echo $user->getLogin();
             echo $user->getPassword();
             $sql = "Select id, login, senha from usuarios_sistemas where login = ? and senha = ?";
             $stmt = Connect::Conn()->prepare($sql);
             $stmt->bindValue(1,$user->getLogin());
             $stmt->bindValue(2,$user->getPassword());
             $stmt->execute();


            if($stmt->rowCount()>0){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            return 0;
        }
    }