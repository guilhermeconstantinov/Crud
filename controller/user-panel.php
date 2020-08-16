<?php
    require_once '../class/User.php';
    require_once '../class/UserDao.php';
    require_once '../class/CustomersDao.php';

    session_start();
    $userDao = new UserDao();

    //Update nos dados de perfil do usuário do sistema
    if(isset($_POST['submit-profile'])){
        $user = $userDao->readUser($_SESSION['id']);
        $name = $_POST['login-name'];
        $email = $_POST['login-email'];
        $password = $_POST['login-senha'];
        $passwordConf = $_POST['login-confirma'];

        if($password != ""){

            if($password == $user->getPassword()){
                if($passwordConf != ""){
                    $user->setPassword($passwordConf);
                }else{
                    $_SESSION['error']['profile'] = "Nova senha precisa ser preenchida";
                }
            }else{
                $_SESSION['error']['profile'] = "Senha atual incorreta";
            }
        }


        //Caso haja erro redireciona para o formulário, caso contrario faz o cadastro

        if(!isset($_SESSION['error']['profile'])){
            $userDao->update($user);
            $_SESSION['profile'] = "Alteração executada com sucesso";

        }
            unset($_POST['submit-profile']);
            header('location: ../dashboard.php?f=perfil');

    }


    if(isset($_POST['company-cnpj'])){
        $customers =  new CustomersDao();
        $date = $customers->readCompany($_POST['company-cnpj']);

        echo json_encode($date);
    }

    if(isset($_POST['placa'])){

    }




?>