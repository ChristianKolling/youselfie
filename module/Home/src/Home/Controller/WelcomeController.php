<?php

namespace Home\Controller;

use Core\Controller\ActionController;
use Zend\View\Model\ViewModel;
use Home\Form\Post as PostForm;
use Home\Validator\Post as PostValidator;

/**
 * @author Christian R. Kolling <christian.si@unochapeco.edu.br>
 */

class WelcomeController extends ActionController
{
    public function homeAction()
    {
        $form = new PostForm();
        $postValidator = new PostValidator();
        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->setInputFilter($postValidator->getInputFilter());
            $form->setData($request->getPost());
            if ($form->isValid()) {
                $dados = $form->getData();            
                $this->getService('Home\Service\Post')->savePost($dados);
            }
        }
        return new ViewModel(array(
            'form' => $form
        ));
    }

    public function novoPostAction() {
        $form = new PostForm();
    }

}
