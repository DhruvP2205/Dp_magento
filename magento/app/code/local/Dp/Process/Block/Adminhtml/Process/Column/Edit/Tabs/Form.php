<?php

class Dp_Process_Block_Adminhtml_Process_Column_Edit_Tabs_Form extends Mage_Adminhtml_Block_Widget_Form
 {
    protected function _prepareForm()
    {
        $form = new Varien_Data_Form();
        $this->setForm($form);
        $fieldset = $form->addFieldset('process_form', array('legend'=>Mage::helper('process')->__('Process information')));

        $fieldset->addField('process_id', 'text', array(
        'label' => Mage::helper('process')->__('Process'),
        'class' => 'required-entry',
        'name' => 'process_id',
        ));

        $fieldset->addField('name', 'text', array(
            'label' => Mage::helper('process')->__('Name'),
            'class' => 'required-entry',
            'name' => 'name',
        ));

        $fieldset->addField('required', 'text', array(
            'label' => Mage::helper('process')->__('Required'),
            'class' => 'required-entry',
            'name' => 'required',
        ));

        $fieldset->addField('castingType', 'text', array(
            'label' => Mage::helper('process')->__('Casting Type'),
            'class' => 'required-entry',
            'name' => 'castingType',
        ));

        $fieldset->addField('exception', 'text', array(
            'label' => Mage::helper('process')->__('Exception'),
            'class' => 'required-entry',
            'name' => 'exception',
        ));    

        if ( Mage::getSingleton('adminhtml/session')->getProData() )
        {
        $form->setValues(Mage::getSingleton('adminhtml/session')->getProData());
        Mage::getSingleton('adminhtml/session')->setProData(null);
        } elseif ( Mage::registry('current_process_column') ) {
        $form->setValues(Mage::registry('current_process_column')->getData());
        }
        return parent::_prepareForm();
    }
 }
