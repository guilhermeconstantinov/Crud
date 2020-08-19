<?php
    require_once 'Connect.php';
    require_once 'User.php';
    class UserDao{
        public function logout(){

                    session_unset();
                    session_destroy();
                    header('location: ../index.php');


        }
         public function create(User $user){
             $sql = "SELECT COUNT(login) FROM usuarios_sistemas where login = ?";
             $select = Connect::Conn()->prepare($sql);
             $select->bindValue(1,$user->getLogin());
             $select->execute();
             $result = $select->fetchColumn(0);


             if($result == 0){
                 $sql = "INSERT INTO usuarios_sistemas(nome,login,senha) values(?,?,?)";
                 $stmt = Connect::Conn()->prepare($sql);
                 $stmt->bindValue(1,$user->getName());
                 $stmt->bindValue(2,$user->getLogin());
                 $stmt->bindValue(3,$user->getPassword());
                 $stmt->execute();
                 return 1;
             }

             return 0;
         }

         public function readUser($id){

            $sql = "SELECT * FROM usuarios_sistemas where id = ?";
            $stmt =  Connect::Conn()->prepare($sql);
            $stmt->bindValue(1, $id);
            $stmt->execute();
            $user =  new User();
            if($stmt->rowCount()>0){

                foreach ( $stmt->fetchAll(PDO::FETCH_ASSOC) as $value){
                    $user->setId($value['id']);
                    $user->setName($value['nome']);
                    $user->setLogin($value['login']);
                    $user->setPassword($value['senha']);
                    $user->setAdmin($value['admin']);

                    return $user;
                }
            }
            return 0;
         }

         public function update(User $user){
             $sql = "Update usuarios_sistemas set  nome = ?, login = ?, senha = ?,admin = ? where id = ?";
             $stmt = Connect::Conn()->prepare($sql);
             $stmt->bindValue(1,$user->getName());
             $stmt->bindValue(2,$user->getLogin());
             $stmt->bindValue(3,$user->getPassword());
             $stmt->bindValue(4,$user->getAdmin());
             $stmt->bindValue(5,$user->getId());
             $stmt->execute();

         }

        public function delete($id){
            $sql = "DELETE * FROM usuarios_sistemas where id = ?";
            $stmt = Connect::Conn()->prepare($sql);
            $stmt->bindValue(1,$id);
            $stmt->execute();
        }
        public function login(User $user){
             $sql = "Select * from usuarios_sistemas where login = ? and senha = ?";
             $stmt = Connect::Conn()->prepare($sql);
             $stmt->bindValue(1,$user->getLogin());
             $stmt->bindValue(2,$user->getPassword());
             $stmt->execute();

            if($stmt->rowCount()>0){
                    $date = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    return $date[0]['id'];

            }
            return 0;
        }
    }