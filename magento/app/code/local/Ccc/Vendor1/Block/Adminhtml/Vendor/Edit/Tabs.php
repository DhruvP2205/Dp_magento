<?php

class Ccc_Vendor_Block_Adminhtml_Vendor_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{
    public function __construct()
    {
        parent::__construct();
        $this->setId('vendor_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle(Mage::helper('vendor')->__('Information'));
    }

    protected function _beforeToHtml()
    {
      $this->addTab('form_section', array(
          'label'     => Mage::helper('vendor')->__('Tabs Folder Information'),         
          'content'   => $this->getLayout()->createBlock('vendor/adminhtml_vendor_edit_tab_form')->toHtml(), //controller ma action call thay
      ));

      $this->addTab('form_section1', array(
          'label'     => Mage::helper('vendor')->__('vendor'),         
          'content'   => $this->getLayout()->createBlock('vendor/adminhtml_vendor_edit_tab_form')->toHtml(),
      ));

      return parent::_beforeToHtml();
    }
}