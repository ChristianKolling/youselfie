<?php

namespace Application\Controller;

use Core\Controller\ActionController;
use Zend\View\Model\ViewModel;
use Application\Form\RecuperarSenha as RecuperarSenha;
use Application\Validator\RecuperacaoSenha as validatorRecuperarSenha;

/**
 * @author Christian R. Kolling <christian.si@unochapeco.edu.br>
 */

class EsqueceuSuaSenhaController extends ActionController 
{

    public function recuperarSenhaAction() 
    {
        $form = new RecuperarSenha();
        $validatorRecuperarSenha = new validatorRecuperarSenha();
        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->setInputFilter($validatorRecuperarSenha->getInputFilter());
            $form->setData($request->getPost());
            if ($form->isValid()) {
                $dados = $form->getData();
                $usuario = $this->getObjectManager()->getRepository('Application\Model\Usuario')
                        ->findOneBy(array('email' => $dados['email']));
                if($usuario){
                    $senha = $this->getService('Application\Service\RecuperarSenha')->getNovaSenha($usuario);
                    if($senha != false){
                        try {
                            $this->getService('Core\Service\EmailSender')->sendEmailRecoverPassword($senha,$usuario);
                            $this->flashMessenger()->addSuccessMessage('Um e-mail foi enviado para '.$usuario->getEmail().', contendo os novas informações para o login.');
                        } catch (\Exception $e) {
                            $this->flashMessenger()->addErrorMessage('Erro ao enviar dados por e-mail, por favor tente mais tarde.');
                        }
                    }
                }  else {
                    $this->flashMessenger()->addErrorMessage('Desculpe, não conseguimos localizar sua conta em nosso banco de dados.');
                }
                return $this->redirect()->toUrl('/');
            }
        }

        return new ViewModel(array(
            'form' => $form,
        ));
        
    }
}
