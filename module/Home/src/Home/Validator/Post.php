<?php

namespace Home\Validator;

use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilter;

class Post
{
    protected $inputFilter;
    
    public function getInputFilter() 
    {
        if (!$this->inputFilter) {
            $inputFilter = new InputFilter();
            $inputFactory = new InputFactory();
            
            $inputFilter->add($inputFactory->createInput(array(
                        'name' => 'publicacao',
                        'required' => true,
                        'filters' => array(
                            array('name' => 'StripTags'),
                            array('name' => 'StringTrim'),
                        ),
                        'validators' => array(
                            array(
                                'name' => 'NotEmpty',
                                'options' => array('message' => 'Diga a seus amigos...')
                            ),
                        ),
            )));
            
            $this->inputFilter = $inputFilter;
        }
        return $this->inputFilter;
    }

}

