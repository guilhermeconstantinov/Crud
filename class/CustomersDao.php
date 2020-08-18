<?php
require_once 'Connect.php';
abstract class CustomersDao{
    private $rua;
    private $num;
    private $bairro;
    private $cidade;
    private $estado;
    private $id_end;

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
    public function setIdEnd($id_end): void
    {
        $this->id_end = $id_end;
    }

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
    public function addEnd($param){

        if($param == "company"){
            $sql = "Insert into endereco(rua,num,bairro,cidade,estado,id_emp) values(?,?,?,?,?,?)";
            $stmt =  Connect::Conn()->prepare($sql);
            $stmt->bindValue(1, $this->getRua());
            $stmt->bindValue(2, $this->getNum());
            $stmt->bindValue(3, $this->getBairro());
            $stmt->bindValue(4, $this->getCidade());
            $stmt->bindValue(5, $this->getEstado());
            $stmt->bindValue(6, $this->getId());
            $stmt->execute();

        }

        if($param == "customers"){
            $sql = "Insert into endereco(rua,num,bairro,cidade,estado,id_emp) values(?,?,?,?,?,?)";
            $stmt =  Connect::Conn()->prepare($sql);
            $stmt->bindValue(1, $this->getRua());
            $stmt->bindValue(2, $this->getNum());
            $stmt->bindValue(3, $this->getBairro());
            $stmt->bindValue(4, $this->getCidade());
            $stmt->bindValue(5, $this->getEstado());
            $stmt->bindValue(6, null);
            $stmt->execute();
            $this->setIdEnd(Connect::Conn()->lastInsertId());
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

    public function registerCustomers(Company $company, Customers $customers, Vehicle $vehicle){

        if($company->addCompany()){
            $company->addEnd("company");
        }
        $customers->addEnd("customers");
        echo "Id-company:".$company->getId()."|||";
        $id_c= $customers->addCustomer($company->getId());
        echo "Id:Cliente".$id_c;
        $vehicle->addVehicle($id_c);
    }

    public function addCompany(){
        $sql = "Insert into empresa(nome_emp,nome_f,cnpj_emp,tel_emp,resp_emp) values(?,?,?,?,?)";
        $stmt = Connect::Conn()->prepare($sql);
        $stmt->bindValue(1, $this->getNome());
        $stmt->bindValue(2, $this->getNomeF());
        $stmt->bindValue(3, $this->getCnpj());
        $stmt->bindValue(4, $this->getTel());
        $stmt->bindValue(5, $this->getResp());

        $result = $this->readCompany($this->getCnpj());
        
        if (!$result) {
            $stmt->execute();

            $this->setId(Connect::Conn()->lastInsertId());
            return 1;

        }else{
            $this->setId($result['id_emp']);
        }

        return 0;

    }


}

class Customers extends CustomersDao{
    protected $id_c;
    protected $nome_c;
    protected $cpf_c;
    protected $cnh_c;
    protected $tipo_c;
    protected $tel;


    public function addCustomer($id_emp){
        $sql = "Insert into clientes(nome_c,cpf_c,cnh_c,tel,tipo_c,id_emp,id_end) values(?,?,?,?,?,?,?)";
        $stmt = Connect::Conn()->prepare($sql);
        $stmt->bindValue(1, $this->getNomeC());
        $stmt->bindValue(2, $this->getCpfC());
        $stmt->bindValue(3, $this->getCnhC());
        $stmt->bindValue(4, $this->getTel());
        $stmt->bindValue(5, $this->getTipoC());
        $stmt->bindValue(6, $id_emp);
       // echo "Meu id".$id_emp."<br>";
        $stmt->bindValue(7, $this->getIdEnd());

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



}
class Vehicle{
    protected $id_carros;
    protected $marca;
    protected $ano;
    protected $modelo;
    protected $placa;
    protected $cor;



    public function addVehicle( $id){
        $sql = "Insert into carros(marca,modelo,ano,placa,cor,id_c) values(?,?,?,?,?,?)";
        $stmt = Connect::Conn()->prepare($sql);
        $stmt->bindValue(1,$this->getMarca());
        $stmt->bindValue(2,$this->getModelo());
        $stmt->bindValue(3,$this->getAno());
        $stmt->bindValue(4,$this->getPlaca());
        $stmt->bindValue(5,$this->getCor());
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
