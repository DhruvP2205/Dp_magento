<?php

class Ccc_Vendor_Block_Adminhtml_Vendor_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
    protected function _prepareForm()
    {
        $form = new Varien_Data_Form();
        $this->setForm($form);
        $fieldset = $form->addFieldset('abc', array('legend'=>Mage::helper('vendor')->__('inform12ation')));

        $id = $this->getRequest()->getParam('id');
        $model = Mage::getModel('vendor/vendor')->load($id);

        $fieldset->addField('vendor_id', 'text', array(
            'label'     => Mage::helper('vendor')->__('id'),
            'readonly' => true,
            'name'      => 'vendor_id',
            'value' => $model->getData('vendor_id'),
        ));
        $fieldset->addField('name', 'text', array(
            'label'     => Mage::helper('vendor')->__('name'),          
            'name'      => 'name',
            'value' => $model->getData('name'),
        ));
        $fieldset->addField('email', 'text', array(
            'label'     => Mage::helper('vendor')->__('email'),          
            'name'      => 'email',
            'value' => $model->getData('email'),
        ));

        if ( Mage::registry('vendor_data') ) {
            $form->setValues(Mage::registry('vendor_data')->getData());
        }
        return parent::_prepareForm();
    }
}