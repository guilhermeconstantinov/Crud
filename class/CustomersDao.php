<?php
require_once 'Connect.php';
abstract class CustomersDao{
    private $rua;
    private $num;
    private $bairro;
    private $cidade;
    private $estado;

    /**
     * @return mixed
     */
    public function getRua()
    {
        return $this->rua;
    }

    /**
     * @param mixed $rua
     */
    public function setRua($rua)
    {
        $this->rua = $rua;
    }

    /**
     * @return mixed
     */
    public function getNum()
    {
        return $this->num;
    }

    /**
     * @param mixed $num
     */
    public function setNum($num)
    {
        $this->num = $num;
    }

    /**
     * @return mixed
     */
    public function getBairro()
    {
        return $this->bairro;
    }

    /**
     * @param mixed $bairro
     */
    public function setBairro($bairro)
    {
        $this->bairro = $bairro;
    }

    /**
     * @return mixed
     */
    public function getCidade()
    {
        return $this->cidade;
    }

    /**
     * @param mixed $cidade
     */
    public function setCidade($cidade)
    {
        $this->cidade = $cidade;
    }

    /**
     * @return mixed
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * @param mixed $estado
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;
    }
    public function addEnd($param ,$userEnd){
        $sql = "Insert into endereco(rua,num,bairro,cidade,estado,id_emp) values(?,?,?,?,?,?)";
        $stmt =  Connect::Conn()->prepare($sql);
        $stmt->bindValue(1, $userEnd->getRua());
        $stmt->bindValue(2, $userEnd->getNum());
        $stmt->bindValue(3, $userEnd->getBairro());
        $stmt->bindValue(4,$userEnd->getCidade());
        $stmt->bindValue(5, $userEnd->getEstado());

        if($param == "company"){
            $stmt->bindValue(6, $userEnd->getId());
            $stmt->execute();

        }else if($param == "customers"){
            $stmt->bindValue(6, null);
            $stmt->execute();
            return Connect::Conn()->lastInsertId();
        }


    }

}

class Company extends CustomersDao
{
    protected $id;
    protected $nome;
    protected $nome_f;
    protected $cnpj;
    protected $tel;
    protected $resp;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    /**
     * @return mixed
     */
    public function getNomeF()
    {
        return $this->nome_f;
    }

    /**
     * @param mixed $nome_f
     */
    public function setNomeF($nome_f)
    {
        $this->nome_f = $nome_f;
    }

    /**
     * @return mixed
     */
    public function getCnpj()
    {
        return $this->cnpj;
    }

    /**
     * @param mixed $cnpj
     */
    public function setCnpj($cnpj)
    {
        $this->cnpj = $cnpj;
    }

    /**
     * @return mixed
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * @param mixed $tel
     */
    public function setTel($tel)
    {
        $this->tel = $tel;
    }

    /**
     * @return mixed
     */
    public function getResp()
    {
        return $this->resp;
    }

    /**
     * @param mixed $resp
     */
    public function setResp($resp)
    {
        $this->resp = $resp;
    }

    public function readCompany($cnpj)
    {

        $sql = "select * from empresa join endereco on empresa.id_emp = endereco.id_emp having empresa.cnpj_emp = ?";
        $stmt = Connect::Conn()->prepare($sql);
        $stmt->bindValue(1, $cnpj);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        return 0;
    }
    public function registerCustomers(Customers $customers){

        if(!$this->readCompany($customers->getCnpj())){
            $this->addCompany($customers);
        };

    }

    public function addCompany(Customers $customers,Company $company, Vehicle $vehicle)
    {
        $sql = "Insert into empresa(nome_emp,nome_f,cnpj_emp,tel_emp,resp_emp) values(?,?,?,?,?)";
        $stmt = Connect::Conn()->prepare($sql);

        $stmt->bindValue(1, $company->getNome());
        $stmt->bindValue(2, $company->getNomeF());
        $stmt->bindValue(3, $company->getCnpj());
        $stmt->bindValue(4, $company->getTel());
        $stmt->bindValue(5, $company->getResp());

        $result = $this->readCompany($company->getCnpj())['id_emp'];
        if (!$result) {
            $stmt->execute();
            $company->setId(Connect::Conn()->lastInsertId());
            $this->addEnd("company",$company);
            $customers->setIdEnd($this->addEnd("customers",$customers));
            $customers->addCustomer($customers);
            $vehicle->addVehicle($vehicle, $customers->addCustomer($customers));
            echo "Final";
        }else{

        }
    }


}

class Customers extends CustomersDao{
    protected $id_c;
    protected $nome_c;
    protected $cpf_c;
    protected $cnh_c;
    protected $tipo_c;
    protected $tel;
    protected $id_emp;
    protected $id_end;

    public function addCustomer( Customers $customers){
        $sql = "Insert into empresa(nome_c,cpf_C,cnh_c,tel,tipo_c,id_emp,id_end) values(?,?,?,?,?,?,?)";
        $stmt = Connect::Conn()->prepare($sql);
        $stmt->bindValue(1, $customers->getNomeC());
        $stmt->bindValue(2, $customers->getCpfC());
        $stmt->bindValue(3, $customers->getTel());
        $stmt->bindValue(4, $customers->getTipoC());
        $stmt->bindValue(5, $customers->getIdEmp());
        $stmt->bindValue(6, $customers->getIdEnd());
        $stmt->execute();
        return Connect::Conn()->lastInsertId();
    }
    /**
     * @return mixed
     */
    public function getIdC()
    {
        return $this->id_c;
    }

    /**
     * @param mixed $id_c
     */
    public function setIdC($id_c)
    {
        $this->id_c = $id_c;
    }

    /**
     * @return mixed
     */
    public function getNomeC()
    {
        return $this->nome_c;
    }

    /**
     * @param mixed $nome_c
     */
    public function setNomeC($nome_c)
    {
        $this->nome_c = $nome_c;
    }

    /**
     * @return mixed
     */
    public function getCpfC()
    {
        return $this->cpf_c;
    }

    /**
     * @param mixed $cpf_c
     */
    public function setCpfC($cpf_c)
    {
        $this->cpf_c = $cpf_c;
    }

    /**
     * @return mixed
     */
    public function getCnhC()
    {
        return $this->cnh_c;
    }

    /**
     * @param mixed $cnh_c
     */
    public function setCnhC($cnh_c)
    {
        $this->cnh_c = $cnh_c;
    }

    /**
     * @return mixed
     */
    public function getTipoC()
    {
        return $this->tipo_c;
    }

    /**
     * @param mixed $tipo_c
     */
    public function setTipoC($tipo_c)
    {
        $this->tipo_c = $tipo_c;
    }

    /**
     * @return mixed
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * @param mixed $tel
     */
    public function setTel($tel)
    {
        $this->tel = $tel;
    }

    /**
     * @return mixed
     */
    public function getIdEmp()
    {
        return $this->id_emp;
    }

    /**
     * @param mixed $id_emp
     */
    public function setIdEmp($id_emp)
    {
        $this->id_emp = $id_emp;
    }

    /**
     * @return mixed
     */
    public function getIdEnd()
    {
        return $this->id_end;
    }

    /**
     * @param mixed $id_end
     */
    public function setIdEnd($id_end)
    {
        $this->id_end = $id_end;
    }

}
class Vehicle{
    protected $id_carros;
    protected $marca;
    protected $ano;
    protected $modelo;
    protected $placa;
    protected $cor;
    protected $id_c;


    public function addVehicle(Vehicle $vehicle, $id){
        $sql = "Insert into carros(marca,modelo,ano,placa,cor,id_c) values(?,?,?,?,?,?)";
        $stmt = Connect::Conn()->prepare($sql);
        $stmt->bindValue(1,$vehicle->getMarca());
        $stmt->bindValue(2,$vehicle->getModelo());
        $stmt->bindValue(3,$vehicle->getAno());
        $stmt->bindValue(4,$vehicle->getPlaca());
        $stmt->bindValue(5,$vehicle->getCor());
        $stmt->bindValue(6, $id);
        $stmt->execute();
    }
    /**
     * @return mixed
     */
    public function getIdCarros()
    {
        return $this->id_carros;
    }

    /**
     * @param mixed $id_carros
     */
    public function setIdCarros($id_carros)
    {
        $this->id_carros = $id_carros;
    }

    /**
     * @return mixed
     */
    public function getMarca()
    {
        return $this->marca;
    }

    /**
     * @param mixed $marca
     */
    public function setMarca($marca)
    {
        $this->marca = $marca;
    }

    /**
     * @return mixed
     */
    public function getAno()
    {
        return $this->ano;
    }

    /**
     * @param mixed $ano
     */
    public function setAno($ano)
    {
        $this->ano = $ano;
    }

    /**
     * @return mixed
     */
    public function getModelo()
    {
        return $this->modelo;
    }

    /**
     * @param mixed $modelo
     */
    public function setModelo($modelo)
    {
        $this->modelo = $modelo;
    }

    /**
     * @return mixed
     */
    public function getPlaca()
    {
        return $this->placa;
    }

    /**
     * @param mixed $placa
     */
    public function setPlaca($placa)
    {
        $this->placa = $placa;
    }

    /**
     * @return mixed
     */
    public function getCor()
    {
        return $this->cor;
    }

    /**
     * @param mixed $cor
     */
    public function setCor($cor)
    {
        $this->cor = $cor;
    }

    /**
     * @return mixed
     */
    public function getIdC()
    {
        return $this->id_c;
    }

    /**
     * @param mixed $id_c
     */
    public function setIdC($id_c)
    {
        $this->id_c = $id_c;
    }


}
