<?php

namespace Home\Service;

use Core\Service\Service;
use Home\Model\Post as novoPost;

class Post extends Service
{
    public function savePost($dados)
    {
        $novoPost = new novoPost();
        $novoPost->setPublicacao($dados['publicacao']);
        $novoPost->setUsuario($this->getObjectManager()->find('Application\Model\Usuario',1));
        $novoPost->setDataPublicacao(new \DateTime('now'));
        $this->getObjectManager()->persist($novoPost);
        
        try {
            $this->getObjectManager()->flush();
        } catch (\Exception $ex) {
            throw new \Exception('Erro durante publicação');
        }
    }
}