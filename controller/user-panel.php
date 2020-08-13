<?php
    require_once '../class/User.php';
    require_once '../class/UserDao.php';

    session_start();
    $userDao = new UserDao();

    if(isset($_POST['submit-profile'])){
        $user = $userDao->readUser($_SESSION['id']);

        $name = $_POST['login-name'];
        $email = $_POST['login-email'];
        $password = $_POST['login-senha'];
        $passwordConf = $_POST['login-confirma'];
        var_dump($_POST);


        //verifica nome e e-mail
        if($name == "" || $email == ""){
            $_SESSION['error']['profile'][]= "Preencha os campo nome e e-mail";
        }else{
            if($name != $user->getName()){
                if (!preg_match("/[a-zA-Z]/", $name)){
                    $_SESSION['error']['profile'][]= "Nome contém caracteres inválidos, digite somente letras";
                }else{
                    $user->setName($name);
                }

            }
            if($email != $user->getLogin()){
                $user->setLogin($email);
            }
        }
        //Verifica senha
        if($password != ""){
            if($password == $user->getPassword()){
                if($passwordConf == ""){
                    $_SESSION['error']['profile'][]= "Preencha o campo nova senha";

                }else if (!preg_match("/^\w*?$/", $passwordConf)){
                    $_SESSION['error']['profile'][]= "Campo senha inválido, somente letras e números";
                }else{
                    $user->setPassword($passwordConf);
                }
            }else{
                $_SESSION['error']['profile'][]= "Senha atual diferente da cadastrada";
            }
        }
        if($passwordConf != "" && $password == ""){
            $_SESSION['error']['profile'][]= "Para mudar a senha digite sua senha atual";
        }

        //Caso haja erro redireciona para o formulário, caso contrario faz o cadastro

        if(isset($_SESSION['error']['profile'])){
            header('location: ../dashboard.php?f=perfil');
        }else{
            $userDao->update($user);
            $_SESSION['profile'] = "Alteração executada com sucesso";
            unset($_POST['submit-profile']);
            header('location: ../dashboard.php?f=perfil');
        }

    }

    if(isset($_POST['submit-customers'])){
        echo"submit aceito";
    }
?>