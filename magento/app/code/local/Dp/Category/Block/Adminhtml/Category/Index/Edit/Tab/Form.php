<?php

class Dp_Category_Block_Adminhtml_Category_Index_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
    protected function _prepareForm()
    {
        $form = new Varien_Data_Form();
        $this->setForm($form);
        $fieldset = $form->addFieldset('category_form', array('legend'=>Mage::helper('category')->__('category information')));

        $fieldset->addField('name', 'text', array(
            'label' => Mage::helper('category')->__('Name'),
            'class' => 'required-entry',
            'name' => 'name',
        ));

        $fieldset->addField('parent_id', 'select', array(
            'label' => Mage::helper('category')->__('Parent Category'),
            'name' => 'parent_id',
            'values' => $this->selectPaths()
        ));

        $fieldset->addField('status', 'select', array(
            'label'     => Mage::helper('category')->__('Status'),          
            'name'      => 'status',
            'values' => array(
                '1'=>'Active',
                '2' => 'Inactive'
            ),
        ));


        if ( Mage::getSingleton('adminhtml/session')->getProData() )
        {
            $form->setValues(Mage::getSingleton('adminhtml/session')->getProData());
            Mage::getSingleton('adminhtml/session')->setProData(null);
        } 
        elseif ( Mage::registry('category_data') ) 
        {
            $form->setValues(Mage::registry('category_data')->getData());
        }
        return parent::_prepareForm();
    }

    public function selectPaths()
    {
        $id = $this->getRequest()->getParam('id');
        $categories = Mage::getModel('category/category')->getCollection()->getItems();
        $finalarray = [];
        $finalarray['root'] = array('value'=>null ,'label'=>'Root Category');
        if($id)
        {
            $allPath = Mage::getModel('category/category')->getResource()->getReadConnection()->fetchAll("SELECT * FROM `category` WHERE `path` NOT LIKE '%$id%' ");
        }
        else
        {
            $allPath = Mage::getModel('category/category')->getResource()->getReadConnection()->fetchAll("SELECT * FROM `category` ORDER BY `path`");
        }
        foreach ($categories as $category) 
        {
            foreach ($allPath as $data)
            {
                if($category->category_id == $data['category_id'])
                {
                    $category_id=$category->category_id;
                    $path = $category->getPath();
                    $array = array('value'=>$category_id ,'label'=>$path);
                    $finalarray[$category_id]=$array;
                }
            }
        }
        return $finalarray;
    }
}
