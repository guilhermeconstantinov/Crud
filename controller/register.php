<?php
    session_start();

    require_once '../class/User.php';
    require_once '../class/UserDao.php';

    if(isset($_SESSION['login'])){
        header('location: ../dashboard.php');
    }

    $user =  new User();
    $useDao =  new UserDao();

    if(isset($_POST['submit'])){
        $user->setName($_POST['register-name']);
        $user->setLogin($_POST['register-email']);
        $user->setPassword($_POST['register-password']);
        $password_confirm = $_POST['register-confirm'];


        if($user->getName() == ""){
            $_SESSION['error']['register'][] = "Preencha seu nome";
        }else{
            if (!preg_match("/[a-zA-Z]/", $user->getName())){

                $_SESSION['error']['register'][] = "Nomes devem conter apenas letras";

            }
        }

        if($user->getLogin() == ""){

            $_SESSION['error']['register'][] = " Preencha o campo de E-mail";

        }


        if($user->getPassword() == ""){

            $_SESSION['error']['register'][] = "Preencha o campo senha";

        }else  if (!preg_match("/^\w*?$/", $user->getPassword())){

            $_SESSION['error']['register'][] = "Senhas somente números e letras";

        }else if($user->getPassword() != $password_confirm) {

            $_SESSION['error']['register'][] = "Campos senhas são diferentes";

        }

        if(isset($_SESSION['error']['register'])){

            header('location: ../index.php?r=register');

        }else{

            $useDao->create($user);
            header('location: ../index.php');
        }

    }