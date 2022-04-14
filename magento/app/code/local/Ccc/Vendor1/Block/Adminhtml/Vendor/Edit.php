<?php

class Ccc_Vendor_Block_Adminhtml_Vendor_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        parent::__construct();

        $this->_objectId = 'id';
        $this->_blockGroup = 'vendor';
        $this->_controller = 'adminhtml_vendor';

        $this->_updateButton('save', 'label', Mage::helper('vendor')->__('Save Item'));
        $this->_updateButton('delete', 'label', Mage::helper('vendor')->__('Delete'));
    }
    
    public function getHeaderText()
    {
        if( Mage::registry('vendor_data') && Mage::registry('vendor_data')->getId() ) {
            return Mage::helper('vendor')->__("Edit Discount '%s'", $this->htmlEscape(Mage::registry('vendor_data')->getGroup_name()));
        } else {
            return Mage::helper('vendor')->__('Add Discount');
        }
    }
}