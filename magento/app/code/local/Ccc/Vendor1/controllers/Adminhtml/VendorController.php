<?php

class Ccc_Vendor_Adminhtml_VendorController extends Mage_Adminhtml_Controller_action
{
    public function indexAction()
    {
        $this->loadLayout();
        $this->renderLayout();
    }

    public function saveAction()
    {
        $data = $this->getRequest()->getPost();
        //print_r($_FILES['filename']['name']);  // name che etle image nu name levu che jo image ni type levi hoy to name ni jagya e type lakhvanu
        //exit;


        $filename = date("dmYhisa").".jpg";
        $contact = Mage::getModel('pro/pro');

        if(isset($_FILES['filename']['name']) && $_FILES['filename']['name'] != '')
        {
            $path = Mage::getBaseDir('media') . DS. 'test' ;

            move_uploaded_file($_FILES["filename"]["tmp_name"],$path."/". $filename);

            $contact->setData('filename',$filename);
        }

        $name = $this->getRequest()->getPost('name');  // post thi database ma thi data lese (name) e form nu use karelu che and getdata ma database ma name nakhse
        $email = $this->getRequest()->getPost('email');
        $rollno = $this->getRequest()->getPost('rollno');
        $gender = $this->getRequest()->getPost('gender');
        $status = $this->getRequest()->getPost('status');




        $contact->setData('stdname',$name);
        $contact->setData('email',$email);
        $contact->setData('rollno',$rollno);
        $contact->setData('gender',$gender);
        $contact->setData('status',$status);




        $contact->save();       
        $this->_redirect('pro/index/index');
    }

    public function deletedataAction()
    {

            $id     = $this->getRequest()->getParam('id');

            $model2  = Mage::getModel('vendor/vendor')->load($id);

            $model2->delete();
                $this->_redirect('*/*/');
    }

    public function massDeleteAction() 
    {
        
            $sampleIds = $this->getRequest()->getParam('vendor');
            
             if(!is_array($sampleIds))
            {
                Mage::getSingleton('adminhtml/session')->addError(Mage::helper('adminhtml')->__('Please select item(s)'));
            } 
            else 
            {
                try
                {
                    foreach ($sampleIds as $sampleId)
                    {
                        $sample = Mage::getModel('vendor/vendor')->load($sampleId);
                        
                        $result = $sample->delete();
                        

                        // $imageDir = Mage::getBaseDir('media').'/test/'.$sample->getFilename();
                        // unlink($imageDir);  // delete image from local directory //
                    }
                    Mage::getSingleton('adminhtml/session')->addSuccess(
                    Mage::helper('adminhtml')->__('Total of %d record(s) were successfully deleted', count($sampleIds)));
                } 
                catch (Exception $e)
                {
                        Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                }
            }
                $this->_redirect('*/*/index');
    }



    public function editDataAction()
    {

        $this->loadLayout();        
        $this->renderLayout();

    }   

    public function editAction() 
    {

        $id     = $this->getRequest()->getParam('id');
        $model  = Mage::getModel('vendor/vendor')->load($id);


        if ($model->getId() || $id == 0) 
        {
            $data = Mage::getSingleton('adminhtml/session')->getFormData(true);                     
            if (!empty($data)) 
            {

                $model->setData($data); //Add Data
            }


            Mage::register('vendor_data', $model);  //edit/tab/form.php
            $this->loadLayout();
            $this->_addContent($this->getLayout()->createBlock('vendor/adminhtml_vendor_edit')) //blocks
                ->_addLeft($this->getLayout()->createBlock('vendor/adminhtml_vendor_edit_tabs'));
            $this->renderLayout();
        } 
        else
        {
            Mage::getSingleton('adminhtml/session')->addError(Mage::helper('vendor')->__('Not Exist'));
            $this->_redirect('*/*/');
        }
    }
}