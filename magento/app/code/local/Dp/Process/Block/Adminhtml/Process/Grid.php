<?php

class Dp_Process_Block_Adminhtml_Process_Grid extends Mage_Adminhtml_Block_Widget_Grid
{

    public function __construct()
    {
        parent::__construct();
        $this->setId('processGrid');
        $this->setDefaultSort('type');
        $this->setDefaultDir('asc');
        $this->setSaveParametersInSession(true);
    }

    protected function _prepareCollection()
    {
        $collection = Mage::getModel('process/process')->getCollection();

        $this->setCollection($collection);
        return parent::_prepareCollection();
    }

    /**
     * Configuration of grid
     */
    protected function _prepareColumns()
    {
        $this->addColumn('process_id', array(
            'header' => Mage::helper('process')->__('ID'),
            'width' => '50px',
            'align' => 'right',
            'index' => 'process_id',
        ));

        $this->addColumn('group_id', array(
            'header' => Mage::helper('process')->__('Group Id'),
            'index' => 'group_id',
        ));

        $this->addColumn('type_id', array(
            'header' => Mage::helper('process')->__('Type Id'),
            'index' => 'type_id',
        ));

        $this->addColumn('name', array(
            'header' => Mage::helper('process')->__('Name'),
            'index' => 'name',
        ));

        $this->addColumn('perRequestCount', array(
            'header' => Mage::helper('process')->__('Per Request Count'),
            'index' => 'perRequestCount',
        ));

        $this->addColumn('requestInterval', array(
            'header' => Mage::helper('process')->__('Request Interval'),
            'index' => 'requestInterval',
        ));

        $this->addColumn('requestModel', array(
            'header' => Mage::helper('process')->__('Request model'),
            'index' => 'requestModel',
        ));

        $this->addColumn('fileName', array(
            'header' => Mage::helper('process')->__('File Name'),
            'index' => 'fileName',
        ));

        $this->addColumn('createdDate', array(
            'header' => Mage::helper('process')->__('Created Date'),
            'index' => 'createdDate',
            'type' => 'date',
        ));
        return parent::_prepareColumns();
    }

    public function getRowUrl($row)
    {
        return $this->getUrl('*/*/edit', array('id'=>$row->getId()));
    }

}
