<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Admin\Model\UserTable;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        $obj = new UserTable();
        $userData = $obj->getList(27);
        return array(
        	'userData'=>$userData
        );
    }
}
