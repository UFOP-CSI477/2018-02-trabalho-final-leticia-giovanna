<?php
/**
 * Created by PhpStorm.
 * User: Giovanna Badaro
 * Date: 02-Dec-18
 * Time: 2:09 AM
 */
require_once 'database.php';

class registro
{
   private $idregistro;
   private $kcal;
   private $agua;
   private $atvfisica;
   private $usuario_idusuario;


    /**
     * @return mixed
     */
    public function __construct()
    {
        $database = new Database();
        $dbSet = $database->dbSet();
        $this->conn = $dbSet;

    }

    public function setId ($value){
        $this->id = $value;
    }

    /**
     * @return mixed
     */
    public function getIdregistro()
    {
        return $this->idregistro;
    }

    /**
     * @return mixed
     */
    public function getKcal()
    {
        return $this->kcal;
    }

    /**
     * @return mixed
     */
    public function getAgua()
    {
        return $this->agua;
    }

    /**
     * @return mixed
     */
    public function getAtvfisica()
    {
        return $this->atvfisica;
    }

    /**
     * @param mixed $tipo
     */
    public function setTipo($tipo): void
    {
        $this->tipo = $tipo;
    }

    /**
     * @param mixed $update_at
     */
    public function setUpdateAt($update_at): void
    {
        $this->update_at = $update_at;
    }

    /**
     * @param mixed $idregistro
     */
    public function setIdregistro($idregistro)
    {
        $this->idregistro = $idregistro;
    }

    /**
     * @param mixed $kcal
     */
    public function setKcal($kcal)
    {
        $this->kcal = $kcal;
    }

    /**
     * @param mixed $agua
     */
    public function setAgua($agua)
    {
        $this->agua = $agua;
    }

    /**
     * @param mixed $atvfisica
     */
    public function setAtvfisica($atvfisica)
    {
        $this->atvfisica = $atvfisica;
    }


    public function insert(){
        $stmt = $this->conn->prepare("INSERT INTO `mydb`(`idregistro`, `kcal`, `agua`, `atvfisica`, `usuario_idusuario`) VALUES (:idregistro, :kcal, :agua, :atvfisica, :usuario_idusuario);");
        $stmt->bindParam(":idregistro",$this->idregistro);
        $stmt->bindParam(":kcal", $stmt->kcal);
        $stmt->bindParam(":agua",$stmt->agua);
        $stmt->bindParam(":atvfisica",$stmt->atvfisica);
        $stmt->bindParam(":usuario_idusuario", $stmt->idusuario_usuario);
        $stmt->execute();
        return $this->conn->lastInsertId();
    }
    public function edit()
    {
        $stmt = $this->conn->prepare("UPDATE `mydb` SET `idregistro` = :idregistro, `kcal` = :kcal, `agua` = :agua, `atvfisica` = :atvfisica, `usuario_idusuario` = :usuario_idusuario, `update_at` = :update_at WHERE `idregistro` = :idregistro;");
        $stmt->bindParam(":idregistro",$this->idregistro);
        $stmt->bindParam(":kcal", $stmt->kcal);
        $stmt->bindParam(":agua", $stmt->agua);
        $stmt->bindParam("atvfisica", $stmt->atvfisica);
        $stmt->bindParam(":usuario_idusuario", $stmt->usuario_idusuario);
        $stmt->execute();
        return $this->idregistro;
    }
    public function delete(){
        $stmt = $this->conn->prepare("DELETE FROM `manutencao` WHERE `idregistro` = :idregistro;");
        $stmt->bindParam(":id", $this->idregistro);
        $stmt->execute();
        return $this->idregistro;
    }
}
