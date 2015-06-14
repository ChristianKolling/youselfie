<?php

namespace Home\Form;

use Zend\Form\Form as Form;

/**
 * @author Christian R. Kolling <christian.si@unochapeco.edu.br>
 */
class Album extends Form 
{

    public function __construct() 
    {
        parent::__construct('album');
        $this->setAttribute('method', 'post');
        $this->setAttribute('action', '');
//        $this->setAttribute('enctype', 'multipart/form-data');
        
        $this->add(array(
            'name' => 'nome-album',
            'type' => 'text',
            'options' => array(
                'label' => 'Nome do Álbum',
            ),
            'attributes' => array(
                'id' => 'nome-album',
                'class' => 'form-control',
                'placeholder' => 'Nome do seu Álbum'
            ),
        ));

        $this->add(array(
            'name' => 'data-criacao',
            'type' => 'Text',
            'options' => array(
                'label' => 'Data de Criação',
            ),
            'attributes' => array(
                'id' => 'data-criacao',
                'class' => 'form-control',
                'readonly' => true,
                'value' => date('d-m-Y')
            ),
        ));

        $this->add(array(
            'name' => 'descricao-album',
            'type' => 'textarea',
            'options' => array(
                'label' => 'Descrição do Álbum',
            ),
            'attributes' => array(
                'id' => 'descricao-album',
                'class' => 'form-control',
                'placeholder' => 'Descrição do seu Álbum'
            ),
        ));

//        $this->add(array(
//            'type' => 'file',
//            'name' => 'foto',
//            'label' => ' ',
//            'attributes' => array(
//                'multiple' => true,
//            ),
//            'options' => array(
//                'input' => array(
//                    'validators' => array(
//                        array(
//                            'name' => 'filesize',
//                            'options' => array(
//                                'max' => '15MB',
//                            ),
//                        ),
//                    ),
//                ),
//            ),
//        ));
        
        $this->add(array(
            'name' => 'criar-album',
            'type' => 'Submit',
            'attributes' => array(
                'value' => 'Criar Álbum',
                'class' => 'btn btn-primary btn-block btn-lg',
            ),
        ));
    }

}
