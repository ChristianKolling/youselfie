<?php

namespace Application\Service;

use Core\Service\Service as Service;
use Application\Model\Usuario as User;

class Usuario extends Service
{
    public function saveUsuario($dados)
    {
        $usuario = new User();
        $usuario->setNome($dados['nome']);
        $usuario->setSobrenome($dados['sobrenome']);
        $usuario->setEmail($dados['email']);
        $dataAtual = new \DateTime(date('Y/m/d'));
        $senha = md5($dados['senha']);
        $confirmarSenha = md5($dados['confirmarsenha']);
        $usuario->setSenha($senha);
        $usuario->setConfirmarsenha($confirmarSenha);
        $ddd = substr($dados['celular'],0,4);
        $celular = substr($dados['celular'],4);
        $usuario->setDdd($ddd);
        $usuario->setCelular($celular);
        $usuario->setNascimento(new \DateTime($dados['nascimento']));
        $usuario->setSexo($this->getObjectManager()->find('Application\Model\Sexo',$dados['sexo']));
        $usuario->setStatus($this->getObjectManager()->find('Application\Model\Status',1));
        $usuario->setDataCadastro($dataAtual);
        
        $this->getObjectManager()->persist($usuario);
        try {
            $this->getObjectManager()->flush();
        } catch (\Exception $exc) {
            throw new Exception('Erro ao salvar Usuário, tente mais tarde.');
        }
    }
    
    public function authenticate($params)
    {
        if (!isset($params['email']) || !isset($params['senha'])) {
            throw new \Exception("Parâmetros inválidos");
        }
        $senha = md5($params['senha']);
        $authService = $this->getServiceManager()->get('Zend\Authentication\AuthenticationService');
        $authAdapter = $authService->getAdapter();
        $authAdapter->setIdentityValue($params['email'])
                ->setCredentialValue($senha);
        $result = $authService->authenticate();

        if (!$result->isValid()) {
            throw new \Exception("Login ou senha inválidos");
        }

        $session = $this->getServiceManager()->get('Session');
        $identity = $result->getIdentity();
        $session->offsetSet('user', $identity);
        $session->offsetSet('role', $identity->getRole());
        return true;
    }
}
