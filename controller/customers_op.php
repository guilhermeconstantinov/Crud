<?php
 require_once '../class/AutoLoad.php';
 require_once '../class/Customers.php';
 session_start();

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

    if(!$customers->readCustomer()){
        $idEmp = $company->addCompany();
        $idCust = $customers->addCustomer($idEmp);
        $vehicle->addVehicle($idCust);
        $_SESSION['register-company'] = "Cadastrado com sucesso";
    }else{
        $_SESSION['register-company'] = "já exite usuário com esse CPF";
    };


    header('location: ../dashboard.php?r=add-cliente');
    unset($_POST['submit-customers']);

}

if(isset($_POST['buscar-consulta'])){
    $result = $customers->readCustomersAll();
    if($result){

    }else{
        $_SESSION['consult'] = "Nenhuma empresa encontrada";
    }
}

if(isset($_POST['submit-update'])){

    $customers = new Customers();
    $vehicle =  new Vehicle();
    $customers->setIdC($_POST['register-id']);
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

    $vehicle->setMarca($_POST['register-marca']);
    $vehicle->setModelo($_POST['register-modelo']);
    $vehicle->setAno($_POST['register-ano']);
    $vehicle->setCor($_POST['register-cor']);
    $vehicle->setPlaca($_POST['register-placa']);
    $customers->updateCustomers($vehicle);
    header('location: ../dashboard.php?r=consulta');
}
if(isset($_POST['company-cnpj'])){
    $company = new Company();
    echo json_encode($company->readCompany($_POST['company-cnpj']));
}