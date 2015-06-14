<?php

namespace Home\Model;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="foto")
 */
class Foto
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     * 
     */
    protected $id;
    
    /**
     * @ORM\Column(type="blob", nullable=true)
     *
     */
    protected $foto;
    
    /**
     * @ORM\ManyToOne(targetEntity="Home\Model\Foto")
     * @ORM\JoinColumn(name="album", referencedColumnName="id")
     * 
     */
    protected $album;
    
    /**
     * @ORM\Column(type="datetime")
     *
     */
    protected $data_publicacao;
    
    function getId() {
        return $this->id;
    }

    function getFoto() {
        return $this->foto;
    }

    function getAlbum() {
        return $this->album;
    }

    function getDataPublicacao() {
        return $this->data_publicacao;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setFoto($foto) {
        $this->foto = $foto;
    }

    function setAlbum($album) {
        $this->album = $album;
    }

    function setDataPublicacao($data_publicacao) {
        $this->data_publicacao = $data_publicacao;
    }


}