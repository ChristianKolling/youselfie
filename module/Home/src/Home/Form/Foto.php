<?php

namespace Home\Form;

use Zend\Form\Form as Form;

/**
 * @author Christian R. Kolling <christian.si@unochapeco.edu.br>
 */
class Foto extends Form 
{

    public function __construct() 
    {
         parent::__construct('foto');
        $this->setAttribute('method', 'post');
        $this->setAttribute('action', '');
        $this->setAttribute('enctype', 'multipart/form-data');
        
        $this->add(array(
            'type' => 'file',
            'name' => 'foto',
            'label' => ' ',
            'attributes' => array(
                'multiple' => true,
            ),
            'options' => array(
                'input' => array(
                    'validators' => array(
                        array(
                            'name' => 'filesize',
                            'options' => array(
                                'max' => '15MB',
                            ),
                        ),
                    ),
                ),
            ),
        ));
        
        $this->add(array(
            'name' => 'publicar',
            'type' => 'Submit',
            'attributes' => array(
                'value' => 'Publicar Fotos',
                'class' => 'btn btn-primary btn-block btn-lg',
            ),
        ));
    }

}