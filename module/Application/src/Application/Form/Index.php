<?php

namespace Application\Form;

use Zend\Form\Form as Form;

/**
 * @author Christian R. Kolling <christian.si@unochapeco.edu.br>
 */

class Index extends Form 
{

    public function __construct() 
    {
        parent::__construct('login');
        $this->setAttribute('method', 'post');
        $this->setAttribute('action', '');

        $this->add(array(
            'name' => 'email',
            'type' => 'Text',
            'options' => array(
                'label' => 'E-mail',
            ),
            'attributes' => array(
                'id' => 'email',
                'class' => 'form-control input-lg',
                'placeholder' => 'Seu E-mail'
            ),
        ));

        $this->add(array(
            'name' => 'senha',
            'type' => 'Password',
            'options' => array(
                'label' => 'Senha',
            ),
            'attributes' => array(
                'id' => 'password',
                'class' => 'form-control input-lg',
                'placeholder' => 'Sua Senha',
            ),
        ));
        
        $this->add(array(
            'type' => 'Checkbox',
            'name' => 'checkbox',
            'options' => array(
                'label' => 'Lembre-me ',
                'use_hidden_element' => true,
                'checked_value' => 'good',
                'unchecked_value' => 'bad'
            ),
            'attributes' => array(
                'class' => 'btn',
                'value' => 1,
            ),
        ));
        
        $this->add(array(
            'name' => 'entrar',
            'type' => 'Submit',
            'attributes' => array(
                'value' => 'Entrar',
                'class' => 'btn btn-lg btn-success btn-block',
            ),
        ));
        
    }
    
}
