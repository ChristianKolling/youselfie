<?php

namespace Home\Validator;

use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilter;

class Album
{
    protected $inputFilter;
    
    public function getInputFilter() 
    {
        if (!$this->inputFilter) {
            $inputFilter = new InputFilter();
            $inputFactory = new InputFactory();
            
            $inputFilter->add($inputFactory->createInput(array(
                        'name' => 'nome-album',
                        'required' => true,
                        'filters' => array(
                            array('name' => 'StripTags'),
                            array('name' => 'StringTrim'),
                        ),
                        'validators' => array(
                            array(
                                'name' => 'NotEmpty',
                                'options' => array('message' => 'Dê um nome ao seu álbum')
                            ),
                        ),
            )));
            
            $this->inputFilter = $inputFilter;
        }
        return $this->inputFilter;
    }

}

