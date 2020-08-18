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

    //Dados para preencher automaticamente o dados do form
    if(isset($_POST['company-cnpj'])){
        $company =  new Company();
        $date = $company->readCompany($_POST['company-cnpj']);

        echo json_encode($date);
    }
    //Adicionando novo cliente
    if(isset($_POST["submit-customers"])){
        $company = new Company();
        $customers = new Customers();
        $vehicle = new Vehicle();

        //Clientes
        $customers->setNomeC($_POST['register-nome']);
        $customers->setCpfC($_POST['register-cpf']);
        $customers->setCnhC($_POST['register-cnh']);
        $customers->setTipoC($_POST['register-tipo']);
        $customers->setTel($_POST['register-tel']);
        $customers->setCidade($_POST['register-cidade']);
        $customers->setEstado($_POST['register-estado']);
        $customers->setRua($_POST['register-rua']);
        $customers->setNum($_POST['register-num']);
        $customers->setBairro($_POST['register-bairro']);

        //Carros
        $vehicle->setMarca($_POST['register-marca']);
        $vehicle->setModelo($_POST['register-modelo']);
        $vehicle->setAno($_POST['register-ano']);
        $vehicle->setCor($_POST['register-cor']);
        $vehicle->setPlaca($_POST['register-placa']);


        //Dados da empresa
        $company->setCnpj($_POST['company-cnpj']);
        $company->setNome($_POST['company-nome']);
        $company->setNomeF($_POST['company-nomef']);
        $company->setResp($_POST['company-resp']);
        $company->setTel($_POST['company-tel']);
        $company->setCidade($_POST['company-cidade']);
        $company->setEstado($_POST['company-estado']);
        $company->setRua($_POST['company-rua']);
        $company->setNum($_POST['company-no']);
        $company->setBairro($_POST['company-bairro']);

        $company->registerCustomers($company,$customers,$vehicle);
        unset($_POST['submit-customers']);

    }
    if(isset($_POST['btn-consulta'])){
        if($_POST['consulta-cnpj']){

        }
        if($_POST['consulta-placa']){

        }
    }




?>

