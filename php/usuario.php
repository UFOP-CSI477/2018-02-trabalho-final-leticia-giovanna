<?php
/**
 * Created by PhpStorm.
 * User: Giovanna Badaro
 * Date: 13-Dec-18
 * Time: 7:48 PM
 */

class usuario
{
  private $idusuario;
  private $nome;
  private $idade;
  private $peso;
  private $altura;
  private $sexo;
  private $email;
  private $senha;



  public function __construct()
  {
      $database = new Database();
      $dbSet = $database->dbSet();
      $this->conn = $dbSet;
  }

    /**
     * @return mixed
     */
    public function getIdusuario()
    {
        return $this->idusuario;
    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @return mixed
     */
    public function getIdade()
    {
        return $this->idade;
    }

    /**
     * @return mixed
     */
    public function getPeso()
    {
        return $this->peso;
    }

    /**
     * @return mixed
     */
    public function getAltura()
    {
        return $this->altura;
    }

    /**
     * @return mixed
     */
    public function getSexo()
    {
        return $this->sexo;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getSenha()
    {
        return $this->senha;
    }

    /**
     * @param mixed $idusuario
     */
    public function setIdusuario($idusuario)
    {
        $this->idusuario = $idusuario;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    /**
     * @param mixed $idade
     */
    public function setIdade($idade)
    {
        $this->idade = $idade;
    }

    /**
     * @param mixed $peso
     */
    public function setPeso($peso)
    {
        $this->peso = $peso;
    }

    /**
     * @param mixed $altura
     */
    public function setAltura($altura)
    {
        $this->altura = $altura;
    }

    /**
     * @param mixed $sexo
     */
    public function setSexo($sexo)
    {
        $this->sexo = $sexo;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @param mixed $senha
     */
    public function setSenha($senha)
    {
        $this->senha = $senha;
    }

    public function insert (){
        $stmt = $this->conn->prepare("INSERT INTO `mydb`(`idusuario`, `nome`, `idade`, `peso`, `altura`,`sexo`,`email`, `senha`) VALUES (:idusuario, :nome, :idade, :peso, :altura, :sexo, :email, :senha);");
        $stmt->bindParam("idusuario", $this->idusuario);
        $stmt->bindParam(":nome",$this->nome);
        $stmt->bindParam(":idade", $this->idade);
        $stmt->bindParam(":peso",$this->peso);
        $stmt->bindParam(":altura",$this->altura);
        $stmt->bindParam(":sexo", $this->sexo);
        $stmt->bindParam(":email",$this->senha);
        $stmt->execute();
        return $this->conn->lastInsertId();
    }
    public function edit(){
        $stmt = $this->conn->prepare("UPDATE `mydb` SET `idusuario` = :idusuario, `nome` = :nome, `idade` = :idade, `peso` = :peso, `altura` = :altura, `sexo` = :sexo, `email`= :email, `senha`= :senha, `update_at` = :update_at WHERE `idregistro` = :idregistro;");
        $stmt->bindParam("idusuario", $this->idusuario);
        $stmt->bindParam(":nome",$this->nome);
        $stmt->bindParam(":idade", $this->idade);
        $stmt->bindParam(":peso",$this->peso);
        $stmt->bindParam(":altura",$this->altura);
        $stmt->bindParam(":sexo", $this->sexo);
        $stmt->bindParam(":email",$this->senha);
        $stmt->execute();
        return $this->idusuario;
    }

    public function delete(){
        $stmt = $this->conn->prepare("DELETE FROM `mydb` WHERE `idusuario` = :idusuario;");
        $stmt->bindParam(":id", $this->idusuario);
        $stmt->execute();
        return $this->idusuario;
    }
}

