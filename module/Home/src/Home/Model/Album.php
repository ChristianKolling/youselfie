<?php

namespace Home\Model;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="album")
 */
class Album
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     * 
     */
    protected $id;
    
    /**
     * @ORM\Column(type="string", length=200, nullable=false)
     * 
     */
    protected $nome;
    
    /**
     * @ORM\Column(type="string", length=200, nullable=true)
     * 
     */
    protected $descricao;
    
    /**
     * @ORM\Column(type="datetime")
     *
     */
    protected $data_criacao;
    
    /**
     * @ORM\ManyToOne(targetEntity="Application\Model\Usuario")
     * @ORM\JoinColumn(name="usuario", referencedColumnName="id")
     * 
     */
    protected $usuario;
    
    function getId() {
        return $this->id;
    }

    function getNome() {
        return $this->nome;
    }

    function getDescricao() {
        return $this->descricao;
    }

    function getDataCriacao() {
        return $this->data_criacao;
    }

    function getUsuario() {
        return $this->usuario;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    function setDataCriacao($data_criacao) {
        $this->data_criacao = $data_criacao;
    }

    function setUsuario($usuario) {
        $this->usuario = $usuario;
    }


}