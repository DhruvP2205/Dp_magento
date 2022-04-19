<?php
$installer = $this;
$installer->startSetup();

$installer->getConnection()->addColumn(
    $this->getTable('salesman'),//table name
    'discount',      //column name
    'float(11,2) NOT NULL default "0"'  //datatype definition
    );
$installer->getConnection()->addColumn(
    $this->getTable('salesman'),//table name
    'status',      //column name
    "tinyint(1) NOT NULL DEFAULT '1'"  //datatype definition
    );
$installer->getConnection()->addColumn(
    $this->getTable('salesman'),//table name
    'created_date',      //column name
    'datetime'  //datatype definition
    );
$installer->getConnection()->addColumn(
    $this->getTable('salesman'),//table name
    'updated_date',      //column name
    'datetime'  //datatype definition
    );
$installer->endSetup();
