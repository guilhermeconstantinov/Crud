<?php
    session_start();
    require_once '../class/User.php';
    require_once '../class/UserDao.php';

    session_unset();

    $user = new User();
    $userDao = new UserDao();

    if(isset($_POST['submit'])){

        $user->setLogin($_POST['login-email']);
        $user->setPassword($_POST['login-password']);


        if($user->getLogin() == ""){
            $_SESSION['error']['login'][] = " Preencha o campo de E-mail";
            header('location: ../index.php');
        }

        if($user->getPassword() == ""){
            $_SESSION['error']['login'][] = "Preencha o campo senha";
            header('location: ../index.php');
        }else {
            if (!preg_match("/^\w*?$/", $user->getPassword())) {
                $_SESSION['error']['login'][] = "Senhas somente números e letras";
                header('location: ../index.php');
            }
        }
        echo '<pre>';

        if($date = $userDao->login($user)){
            $_SESSION['id'] = $date['id'];
            $_SESSION['login'] = $date['login'];
            $_SESSION['password'] = $date['senha'];
            header('location: ../dashboard.php');
        }else{
            $_SESSION['error']['login'][] = "Email ou senha incorretos";
            header('location: ../index.php');
        };



    }







