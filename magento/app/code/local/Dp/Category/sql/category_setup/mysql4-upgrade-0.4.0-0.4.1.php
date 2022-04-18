<?php
$installer = $this;
$installer->startSetup();
$installer->getConnection()->addColumn(
    $this->getTable('category'),//table name
    'path',      //column name
    'varchar(255) NOT NULL'  //datatype definition
    );
$installer->getConnection()->addColumn(
    $this->getTable('category'),//table name
    'createdDate',      //column name
    'datetime'  //datatype definition
    );
$installer->getConnection()->addColumn(
    $this->getTable('category'),//table name
    'updatedDate',      //column name
    'datetime'  //datatype definition
    );
$installer->endSetup();
