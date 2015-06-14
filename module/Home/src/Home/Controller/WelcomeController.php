<?php

namespace Home\Controller;

use Core\Controller\ActionController;
use Zend\View\Model\ViewModel;
use Home\Form\Post as PostForm;
use Home\Form\Album as AlbumForm;
use Home\Validator\Post as PostValidator;

/**
 * @author Christian R. Kolling <christian.si@unochapeco.edu.br>
 */

class WelcomeController extends ActionController
{
    public function homeAction()
    {
        $this->layout('layout/home.phtml');
        $form = new PostForm();
        $albumForm = new AlbumForm();
        $postValidator = new PostValidator();
        if ($this->getRequest()->isPost()) {
            $form->setInputFilter($postValidator->getInputFilter());
            $form->setData($this->getRequest()->getPost());
            if ($form->isValid()) {
                $dados = $form->getData();
                $this->getService('Home\Service\Post')->savePost($dados);
            }
        }
        return new ViewModel(array(
            'form' => $form,
            'album' => $albumForm
        ));
    }
    
    public function uploadAlbumAction() 
     {
        if ($this->getRequest()->isPost()) {
            $files = $this->getRequest()->getFiles('foto');
            $this->getService('Core\Service\Upload')->uploadPhoto($files);
        }
    }

}
