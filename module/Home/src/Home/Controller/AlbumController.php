<?php

namespace Home\Controller;

use Core\Controller\ActionController;
use Zend\View\Model\ViewModel;
use Home\Form\Album as Form;
use Home\Validator\Album as AlbumValidator;
use Home\Form\Foto as FormFoto;
class AlbumController extends ActionController
{
    public function indexAction()
    {
        $this->layout('layout/home.phtml');
        $result = $this->getService('Home\Service\Album')->fetchAll();
        return new ViewModel(array(
            'dados' => $result
        ));
    }
    
    public function novoAction()
    {
        $this->layout('layout/home.phtml');
        $form = new Form();
        $albumValidator = new AlbumValidator();
        if($this->getRequest()->isPost()){
            $form->setInputFilter($albumValidator->getInputFilter());
            $form->setData($this->getRequest()->getPost());
            if ($form->isValid()) {
                $dados = $form->getData();
                try {
                    $this->getService('Home\Service\Album')->saveAlbum($dados);
                } catch (\Exception $ex) {
                    $this->flashMessenger()->addErrorMessage('Não foi possível criar o álbum, tente mais tarde.');
                }
                $this->redirect()->toUrl('/home/album/index');
            }
        }
        return new ViewModel(array(
            'form' => $form
        ));
    }
    
    public function visualizarAction()
    {
        $formFoto = new FormFoto();
        $this->layout('layout/home.phtml');
        $id = $this->params()->fromRoute('id',0);
        $result = $this->getService('Home\Service\Album')->fetchAll($id);
        return new ViewModel(array(
            'dados' => $result,
            'form' => $formFoto
        ));
    }
}

