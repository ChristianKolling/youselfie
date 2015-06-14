<?php

namespace Application\Model;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="usuario")
 */
class Usuario 
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     * 
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=50)
     * 
     */
    protected $nome;

    /**
     * @ORM\Column(type="string", length=50)
     * 
     */
    protected $sobrenome;

    /**
     * @ORM\Column(type="string", length=100, unique=true)
     * 
     */
    protected $email;
    
    
    /**
     * @ORM\Column(type="string", length=4)
     * 
     */
    protected $ddd;

    /**
     * @ORM\Column(type="string", length=11)
     * 
     */
    protected $celular;

    /**
     * @ORM\Column(type="string", length=255)
     * 
     */
    protected $senha;

    /**
     * @ORM\Column(type="string", length=255)
     * 
     */
    protected $confirmarsenha;

    /**
     * @ORM\Column(type="date")
     *
     */
    protected $nascimento;
    
    /**
     * @ORM\Column(type="date")
     *
     */
    protected $dataCadastro;

    /**
     * @ORM\ManyToOne(targetEntity="Sexo")
     * @ORM\JoinColumn(name="sexo", referencedColumnName="id")
     * 
     */
    protected $sexo;
    
    /**
     * @ORM\ManyToOne(targetEntity="Status")
     * @ORM\JoinColumn(name="status", referencedColumnName="id")
     * 
     */
    protected $status;    
    
   /**
     * @ORM\Column(type="string", length=30)
     * 
     */
    protected $role;
    
    function getDataCadastro() {
        return $this->dataCadastro;
    }

    function setDataCadastro($dataCadastro) {
        $this->dataCadastro = $dataCadastro;
    }

    function getId() {
        return $this->id;
    }

    function getNome() {
        return $this->nome;
    }

    function getSobrenome() {
        return $this->sobrenome;
    }

    function getEmail() {
        return $this->email;
    }

    function getDdd() {
        return $this->ddd;
    }

    function getCelular() {
        return $this->celular;
    }

    function getSenha() {
        return $this->senha;
    }

    function getConfirmarsenha() {
        return $this->confirmarsenha;
    }

    function getNascimento() {
        return $this->nascimento;
    }

    function getSexo() {
        return $this->sexo;
    }

    function getStatus() {
        return $this->status;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setSobrenome($sobrenome) {
        $this->sobrenome = $sobrenome;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setDdd($ddd) {
        $this->ddd = $ddd;
    }

    function setCelular($celular) {
        $this->celular = $celular;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }

    function setConfirmarsenha($confirmarsenha) {
        $this->confirmarsenha = $confirmarsenha;
    }

    function setNascimento($nascimento) {
        $this->nascimento = $nascimento;
    }

    function setSexo($sexo) {
        $this->sexo = $sexo;
    }

    function setStatus($status) {
        $this->status = $status;
    }
        
    function getRole() {
        return $this->role;
    }

    function setRole($role) {
        $this->role = $role;
    }


}
