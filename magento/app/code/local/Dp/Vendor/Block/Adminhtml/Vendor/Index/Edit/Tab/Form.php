<?php

class Dp_Vendor_Block_Adminhtml_Vendor_Index_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
  protected function _prepareForm()
  {
      $form = new Varien_Data_Form();
      $this->setForm($form);
      $fieldset = $form->addFieldset('vendor_form', array('legend'=>Mage::helper('vendor')->__('vendor information')));

      $id = $this->getRequest()->getParam('id');
      $model = Mage::getModel('vendor/vendor')->load($id);
      
      $fieldset->addField('first_name', 'text', array(
          'label'     => Mage::helper('vendor')->__('First Name'),          
          'name'      => 'first_name',
          'value' => $model->getData('first_name'),
      ));
      $fieldset->addField('last_name', 'text', array(
          'label'     => Mage::helper('vendor')->__('Last Name'),          
          'name'      => 'last_name',
          'value' => $model->getData('last_name'),
      ));        
      $fieldset->addField('email', 'text', array(
          'label'     => Mage::helper('vendor')->__('email'),          
          'name'      => 'email',
          'value' => $model->getData('email'),
      ));
      $fieldset->addField('mobile', 'text', array(
          'label'     => Mage::helper('vendor')->__('Mobile'),          
          'name'      => 'mobile',
          'value' => $model->getData('mobile'),
      ));
      $fieldset->addField('status', 'select', array(
          'label'     => Mage::helper('vendor')->__('Status'),          
          'name'      => 'status',
          'values' => array(
                      '1'=>'Active',
                      '2' => 'Inactive'
                    ),
      ));

      if ( Mage::registry('vendor_data') )
      {
          $form->setValues(Mage::registry('vendor_data')->getData());
      }
      return parent::_prepareForm();
  }
}
