<?php

namespace Home\Form;

use Zend\Form\Form as Form;

/**
 * @author Christian R. Kolling <christian.si@unochapeco.edu.br>
 */

class Post extends Form 
{

    public function __construct() 
    {
        parent::__construct('post-form');
        $this->setAttribute('method', 'post');
        $this->setAttribute('action', '');

        $this->add(array(
            'name' => 'publicacao',
            'type' => 'textarea',
            'options' => array(
                'label' => '',
            ),
            'attributes' => array(
                'id' => 'publicacao',
                'class' => '',
                'placeholder' => 'Compartilhe algo com seus amigos'
            ),
        ));
        
    }
    
}
