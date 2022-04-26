<?php

class Dp_Process_Block_Adminhtml_Process_Column_Grid extends Mage_Adminhtml_Block_Widget_Grid
{

    public function __construct()
    {
        parent::__construct();
        $this->setId('columnGrid');
        $this->setDefaultSort('type');
        $this->setDefaultDir('asc');
        $this->setSaveParametersInSession(true);
    }

    /**
     * Init category columns collection
     * @return void
     */
    protected function _prepareCollection()
    {
        $collection = Mage::getModel('process/column')->getCollection();

        $this->setCollection($collection);
        return parent::_prepareCollection();
    }

    /**
     * Configuration of grid
     */
    protected function _prepareColumns()
    {
        $this->addColumn('column_id', array(
            'header' => Mage::helper('process')->__('ID'),
            'width' => '50px',
            'align' => 'right',
            'index' => 'column_id',
        ));

        $this->addColumn('process_id', array(
            'header' => Mage::helper('process')->__('Process Id'),
            'index' => 'process_id',
        ));

        $this->addColumn('name', array(
            'header' => Mage::helper('process')->__('Name'),
            'index' => 'name',
        ));

        $this->addColumn('required', array(
            'header' => Mage::helper('process')->__('Required'),
            'index' => 'required',
        ));

        $this->addColumn('castingType', array(
            'header' => Mage::helper('process')->__('Casting Type'),
            'index' => 'castingType',
        ));

        $this->addColumn('exception', array(
            'header' => Mage::helper('process')->__('Exception'),
            'index' => 'exception',
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
