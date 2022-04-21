<?php

class Dp_Vendor_Adminhtml_VendorController extends Mage_Adminhtml_Controller_Action
{
    public function indexAction()
    {
        $this->_title($this->__('Vendor'))->_title($this->__('Vendor Info'));
        $this->loadLayout();
        $this->_setActiveMenu('vendor/group');
        $this->renderLayout();
    }

    public function newAction()
    {
        $this->_forward('edit');
    }

    public function editAction() 
    {
        $this->loadLayout();
        $model = Mage::getModel('vendor/vendor');

        if ($this->getRequest()->getParam('id')) 
        {
            $id = $this->getRequest()->getParam('id');
            $model->load($id);
            if(!$model->getId()) 
            {
                Mage::getSingleton('adminhtml/session')->addError(Mage::helper('vendor')->__('Not Exist'));
                $this->_redirect('*/*/index');
                return;
            }
        } 
        Mage::register('vendor_data', $model);  

        $this->_addContent($this->getLayout()->createBlock('vendor/adminhtml_vendor_index_edit')) 
            ->_addLeft($this->getLayout()->createBlock('vendor/adminhtml_vendor_index_edit_tabs'));
        $this->renderLayout();
    }

    public function deleteAction()
    {
        if( $this->getRequest()->getParam('id') > 0 ) 
        {
            $id = $this->getRequest()->getParam('id');
            $model2 = Mage::getModel('vendor/vendor')->load($id);
            $model = Mage::getModel('vendor/vendor');             
            $model->setId($this->getRequest()->getParam('id'))->delete(); //delete operation

            Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('adminhtml')->__('successfully deleted'));
            $this->_redirect('vendor/adminhtml_vendor/grid');   
        }
        $this->_redirect('vendor/adminhtml_vendor/index');
    }   

    public function saveAction() 
    {   
        try
        {
            if (!$this->getRequest()->getPost())
            {   
                Mage::getSingleton('adminhtml/session')->addError(Mage::helper('adminhtml')->__('Invalid request.'));   
            }

            $postData = $this->getRequest()->getPost();
            $vendor = Mage::getModel('vendor/vendor');
            $id = ($this->getRequest()->getParam('id'));
            if($id)
            {
                $postData = array_merge(['entity_id' => $id],$postData);
            }
            $vendor->setData($postData);
            if($id)
            {
                $vendor->setData('updated_date', Mage::getModel('core/date')->date('Y-m-d H:i:s'));
            }
            else{
                $vendor->setData('created_date', Mage::getModel('core/date')->date('Y-m-d H:i:s'));
            }
            $vendor->save();
            $this->_redirect('*/*/');
            Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('vendor')->__('Vendor saved successfully.'));
        }
        catch (Exception $e)
        {
            Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
        }
        $this->_redirect('vendor/adminhtml_vendor/index');
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
                    $sample->delete();
                }
                Mage::getSingleton('adminhtml/session')->addSuccess(
                Mage::helper('adminhtml')->__('Total of %d record(s) were successfully deleted', count($sampleIds)));
            }
            catch (Exception $e)
            {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
            }
        }
        $this->_redirect('vendor/adminhtml_vendor/index');
    }
}

