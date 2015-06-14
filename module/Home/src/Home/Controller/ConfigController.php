<?php

namespace Home\Controller;

use Core\Controller\ActionController;
use Zend\View\Model\ViewModel;

class ConfigController extends ActionController
{
    public function indexAction() 
    {
        $this->layout('layout/home.phtml');
        return new ViewModel(array(
            
        ));
    }
}