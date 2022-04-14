<?php
class Ccc_Vendor_Block_Adminhtml_Vendor_Index extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function __construct()
    {
        $this->_controller = 'adminhtml_vendor_index';
        $this->_blockGroup = 'vendor';
        $this->_headerText = Mage::helper('vendor')->__('Vendor');
        $this->_addButtonLabel = Mage::helper('vendor')->__('Add Vendor');
        parent::__construct();
    }
}