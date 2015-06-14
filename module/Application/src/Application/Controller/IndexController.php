<?php

namespace Application\Controller;

use Core\Controller\ActionController;
use Zend\View\Model\ViewModel;
use Application\Form\Index as Form;
use Application\Validator\Login as loginValidator;

/**
 * @author Christian R. Kolling <christian.si@unochapeco.edu.br>
 */

class IndexController extends ActionController
{
    public function indexAction()
    {
        $form = new Form();
        $loginValidator = new loginValidator();
        $session = $this->getServiceLocator()->get('Session');
        if ($session->offsetGet('role') == 'usuario') {
            return $this->redirect()->toUrl('/home/welcome/home');
        }
        $request = $this->getRequest();
        if($request->isPost()){
            $form->setInputFilter($loginValidator->getInputFilter());
            $form->setData($request->getPost());
            if($form->isValid()){
                $dados = $form->getData();
                $usuario = $this->getObjectManager()->getRepository('Application\Model\Usuario')
                        ->findOneBy(array(
                            'email' => $dados['email'],
                            'senha' => md5($dados['senha']),
                            'confirmarsenha' => md5($dados['senha']),
                        ));
                if ($usuario) {
                    try {
                        $this->getService('Application\Service\Usuario')->authenticate($dados);
                        if ($session->offsetGet('role') == 'usuario'){
                            return $this->redirect()->toUrl('/home/welcome/home');
                        }
                        else{
                            return $this->redirect()->toUrl('/');
                        }
                    } catch (\Exception $e) {
                        $this->flashMessenger()->addErrorMessage($e->getMessage());
                    }
                    return $this->redirect()->toUrl('/');
                } else {
                    $this->flashMessenger()->addErrorMessage('Não conseguimos localizar sua conta, por favor tente novamente.');
                    return $this->redirect()->toUrl('/');
                }
            }
        }
        return new ViewModel(array(
            'form' => $form,
        ));
    }
}
