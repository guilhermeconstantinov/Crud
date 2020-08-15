<?php
    session_start();
    require_once '../class/User.php';
    require_once '../class/UserDao.php';

    if(!isset($_SESSION['login'])){
        header('location: ../index.php');
    }


    $user = new User();
    $userDao = new UserDao();

    if(isset($_POST['submit'])){

        $user->setLogin($_POST['login-email']);
        $user->setPassword($_POST['login-password']);


            if($date = $userDao->login($user)){

                $_SESSION['id'] = $date;

                header('location: ../dashboard.php');
            }else{
                $_SESSION['error']['login'] = "Email ou senha incorretos";
                header('location: ../index.php');
            }



    }







