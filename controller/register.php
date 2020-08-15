<?php
    session_start();

    require_once '../class/User.php';
    require_once '../class/UserDao.php';

    if(isset($_SESSION['id'])){
        header('location: /user-panel.php');
    }

    $user =  new User();
    $useDao =  new UserDao();

    if(isset($_POST['submit'])){
        $user->setName($_POST['register-name']);
        $user->setLogin($_POST['register-email']);
        $user->setPassword($_POST['register-password']);
        $password_confirm = $_POST['register-confirm'];


         if($user->getPassword() != $password_confirm) {

            $_SESSION['error']['register'] = "Campos senhas são diferentes";
            header('location: ../index.php?r=register');

         }else{
             if($useDao->create($user)){
                 header('location: ../index.php');
                 $_SESSION['error']['login'] = "Cadastro feito com sucesso";
             }else{
                 $_SESSION['error']['register'] = "Usuário já existe";
                 header('location: ../index.php?r=register');
                 echo "entrei";
             }
         }







    }