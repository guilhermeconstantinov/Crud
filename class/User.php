<?php
    require_once  'Connect.php';
    class User{
        private $id;
        private $name;
        private $email;
        private $password;
        private $admin;
        private $confirm;

        public function logout($url){

            if(isset($_GET['f']) && $_GET['f'] == 'deslogar'){
                session_unset();
                session_destroy();
            }
            if(!isset($_SESSION['id'])){
                header('location: '.$url);
            }

        }
        public function update($name,$email, $password,$passconf){
            $status = false;


            if($password != ""){
                if( $password == $this->getPassword()){
                    if($passconf != ""){
                        $this->setPassword($passconf);
                        $status = true;
                    }else{

                       $_SESSION['profile'] =  "Nova senha deve ser preenchida";
                    }
                }else{

                    $_SESSION['profile'] = "Senha atual incorreta";
                }
            }
            if($name != $this->getName() || $email != $this->getEmail()){
                $status = true;
            }
            if($status){
                $this->setName($name);
                $this->setEmail($email);
                $sql = "UPDATE usuarios_sistemas SET nome = ?, login = ?, senha = ? where id = ?";
                $stmt = Connect::Conn()->prepare($sql);
                $stmt->bindValue(1,$this->getName());
                $stmt->bindValue(2,$this->getEmail());
                $stmt->bindValue(3,$this->getPassword());
                $stmt->bindValue(4,$this->getId());
                $stmt->execute();

                $_SESSION['profile'] = "Alteração feita com sucesso";

            }
            return 1;


        }
        public function login($url,$urlError){
            $sql = "SELECT id FROM usuarios_sistemas where login = ? and senha = ?";
            $stmt =  Connect::Conn()->prepare($sql);
            $stmt->bindValue(1,$this->getEmail());
            $stmt->bindValue(2,$this->getPassword());
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if($result){

                $_SESSION['id'] = $result['id'];
                header("location: ".$url);
            }else{
                $_SESSION['login'] = "E-mail ou senha incorretos";
                header('location:'.$urlError);
            }
            return 0;
        }
        public function readUser(){
            $sql = "SELECT COUNT(login) FROM usuarios_sistemas where login = ?";
            $stmt = Connect::Conn()->prepare($sql);
            $stmt->bindValue(1,$this->getEmail());
            $stmt->execute();
            return $stmt->fetchColumn(0);
        }
        public function readLogin(){
            $sql = "SELECT * FROM usuarios_sistemas where id = ?";
            $stmt = Connect::Conn()->prepare($sql);
            $stmt->bindValue(1,$_SESSION['id']);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if($result){

                $this->setId($result['id']);
                $this->setName($result['nome']);
                $this->setEmail($result['login']);
                $this->setPassword($result['senha']);
                $this->setAdmin($result['admin']);

            }else{
                $this->logout('index.php');
            }
        }

        public function create(){

            if(!$this->readUser()){
                if($this->getConfirm() == $this->getPassword()){
                    $sql = "INSERT INTO usuarios_sistemas(nome,login,senha) values(?,?,?)";
                    $stmt = Connect::Conn()->prepare($sql);
                    $stmt->bindValue(1,$this->getName());
                    $stmt->bindValue(2,$this->getEmail());
                    $stmt->bindValue(3,$this->getPassword());
                    $stmt->execute();
                    $_SESSION['register'] = "Cadastro efetuado com sucesso";
                }else{
                    $_SESSION['register'] = "Confirmação de senha está diferente";
                }


            }else{
                $_SESSION['register'] = "Usuário já existe";
            }
            header('location: ../index.php');

            return 1;
        }
        /**
         * @return mixed
         */
        public function getId()
        {
            return $this->id;
        }

        /**
         * @param mixed
         */
        public function setId($id)
        {
            $this->id = $id;
        }

        /**
         * @return mixed
         */
        public function getConfirm()
        {
            return $this->confirm;
        }

        /**
         * @param mixed $confirm
         */
        public function setConfirm($confirm): void
        {
            $this->confirm = $confirm;
        }


        /**
         * @return mixed
         */
        public function getName()
        {
            return $this->name;
        }

        /**
         * @param mixed $name
         */
        public function setName($name)
        {

            $this->name = ucwords($name);

        }

        /**
         * @return mixed
         */
        public function getEmail()
        {
            return $this->email;
        }

        /**
         * @param mixed $email
         */
        public function setEmail($email): void
        {
            $this->email = $email;
        }

        /**
         * @return mixed
         */


        /**
         * @return mixed
         */
        public function getPassword()
        {
            return $this->password;
        }

        /**
         * @param mixed $password
         */
        public function setPassword($password)
        {
            $this->password = $password;
        }

        /**
         * @return mixed
         */
        public function getAdmin()
        {
            return $this->admin;
        }

        /**
         * @param mixed
         */
        public function setAdmin($admin)
        {
            $this->admin = $admin;
        }

    }

