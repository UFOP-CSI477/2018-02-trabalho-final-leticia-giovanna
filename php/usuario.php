 <?php

require_once 'database.php';

class Usuario
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

    public function setIdUsuario ($value){
        $this->idusuario = $value;
    }

    public function setNome ($value){
        $this->nome = $value;
    }

    public function setIdade ($value){
        $this->idade = $value;
    }

    public function setPeso ($value){
        $this->peso = $value;
    }

    public function setAltura ($value){
        $this->altura = $value;
    }

    public function setSexo ($value){
        $this->sexo = $value;
    }

    public function setEmail($value){
        $this->email = $value;
    }

    public function setSenha ($value){
        $this->senha = $value;
    }

    public function insert(){
        $stmt = $this->conn->prepare("INSERT INTO `usuario`(`nome`, `idade`, `peso`, `altura`, `sexo`, `email`, `senha`) VALUES (:nome, :idade, :peso, :altura, :sexo, :email, :senha);");
        $stmt->bindParam(":nome",$this->nome);
        $stmt->bindParam(":idade", $this->idade);
        $stmt->bindParam(":peso",$this->peso);
        $stmt->bindParam(":altura",$this->altura);
        $stmt->bindParam(":sexo", $this->sexo);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":senha", $this->senha);
        $stmt->execute();
        return $this->conn->lastInsertId();
    } 

}

?>