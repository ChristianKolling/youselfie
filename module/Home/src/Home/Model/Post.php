<?php

namespace Home\Model;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="post")
 */
class Post 
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     * 
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=2000)
     * 
     */
    protected $publicacao;
    
    /**
     * @ORM\Column(type="datetime")
     *
     */
    protected $data_publicacao;

    /**
     * @ORM\ManyToOne(targetEntity="Application\Model\Usuario")
     * @ORM\JoinColumn(name="usuario", referencedColumnName="id")
     * 
     */
    protected $usuario;
   
    function getId() {
        return $this->id;
    }

    function getPublicacao() {
        return $this->publicacao;
    }

    function getDataPublicacao() {
        return $this->data_publicacao;
    }

    function getUsuario() {
        return $this->usuario;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setPublicacao($publicacao) {
        $this->publicacao = $publicacao;
    }

    function setDataPublicacao($data_publicacao) {
        $this->data_publicacao = $data_publicacao;
    }

    function setUsuario($usuario) {
        $this->usuario = $usuario;
    }


}
