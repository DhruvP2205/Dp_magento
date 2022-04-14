<?php

class Crud_Pro_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {       
        $this->loadLayout();     
        $this->renderLayout(); 
    }

    public function saveAction()
    {
        $data = $this->getRequest()->getPost();

        $proModel = Mage::getModel('pro/pro');

        $name = $this->getRequest()->getPost('name');
        $email = $this->getRequest()->getPost('email');
        $rollno = $this->getRequest()->getPost('rollno');
        $gender = $this->getRequest()->getPost('gender');
        $status = $this->getRequest()->getPost('status');

        $proModel->setData('stdname',$name);
        $proModel->setData('email',$email);
        $proModel->setData('rollno',$rollno);
        $proModel->setData('gender',$gender);
        $proModel->setData('status',$status);

        $proModel->save();       
        $this->_redirect('pro/index/index');
    }

    public function deletedataAction()
    {
        $id = $this->getRequest()->getParam('id');
        $proModel  = Mage::getModel('pro/pro')->load($id);
        $proModel->delete();
        $this->_redirect('*/*/');
    }

    public function editDataAction()
    {
        $this->loadLayout();        
        $this->renderLayout();
    }   

    public function editAction()
    {
        $id = $this->getRequest()->getParam('id');      
        $proModel = Mage::getModel('pro/pro')->load($id);
        $data = $this->getRequest()->getPost();

        $proModel->setData('stdname',$data['name']);
        $proModel->setData('email',$data['Email']);
        $proModel->setData('rollno',$data['Roll']);
        $proModel->setData('gender',$data['gender']);
        $proModel->setData('status',$data['status']);
        $proModel->save();

        $this->_redirect('*/*/');   
    }   
}
