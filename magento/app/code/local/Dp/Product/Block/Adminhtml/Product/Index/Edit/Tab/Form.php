<?php

class Dp_Product_Block_Adminhtml_Product_Index_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
    protected function _prepareForm()
    {
        $form = new Varien_Data_Form();
        $this->setForm($form);
        $fieldset = $form->addFieldset('product_form', array('legend'=>Mage::helper('product')->__('Product Information')));

        $fieldset->addField('name', 'text', array(
         'label' => Mage::helper('product')->__('Name'),
         'class' => 'required-entry',
         'name' => 'name',
         ));
        
        $fieldset->addField('sku', 'text', array(
         'label' => Mage::helper('product')->__('SKU'),
         'class' => 'required-entry',
         'name' => 'sku',
         ));

        $fieldset->addField('quantity', 'text', array(
         'label' => Mage::helper('product')->__('Quantity'),
         'class' => 'required-entry',
         'name' => 'quantity',
         ));

        $fieldset->addField('price', 'text', array(
         'label' => Mage::helper('product')->__('Price'),
         'class' => 'required-entry',
         'name' => 'price',
         ));

        $fieldset->addField('costPrice', 'text', array(
         'label' => Mage::helper('product')->__('Cost Price'),
         'class' => 'required-entry',
         'name' => 'costPrice',
         ));


        if ( Mage::getSingleton('adminhtml/session')->getProData() )
        {
            $form->setValues(Mage::getSingleton('adminhtml/session')->getProData());
            Mage::getSingleton('adminhtml/session')->setProData(null);
        } 
        elseif ( Mage::registry('product_data') ) 
        {
            $form->setValues(Mage::registry('product_data')->getData());
        }
        return parent::_prepareForm();
    }
}
