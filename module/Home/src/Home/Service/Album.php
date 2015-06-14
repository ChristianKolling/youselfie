<?php

namespace Home\Service;

use Core\Service\Service;
use Home\Model\Album as novoAlbum;

class Album extends Service
{
    public function fetchAll()
    {
        $sql = $this->getObjectManager()->createQueryBuilder()
                ->select('Album.id,Album.nome,Album.descricao,Album.data_criacao')
                ->from('Home\Model\Album','Album');
        return $sql->getQuery()->getResult();
    }

    public function saveAlbum($dados)
    {
        $album = new novoAlbum();
        $album->setNome($dados['nome-album']);
        $album->setDescricao($dados['descricao-album']);
        $album->setDataCriacao(new \DateTime('now'));
        $album->setUsuario($this->getObjectManager()->find('Application\Model\Usuario',1));
        $this->getObjectManager()->persist($album);
        try {
            $this->getObjectManager()->flush();
        } catch (\Exception $ex) {
            throw new Exception('Erro ao cadastrar álbum, por favor tente mais tarde.');
        }
    }
}