<?php
$installer = $this;
$installer->startSetup();
$installer->getConnection()->addColumn(
    $this->getTable('salesman'),//table name
    'status',      //column name
    "tinyint(1) NOT NULL DEFAULT '1'"  //datatype definition
    );
$installer->endSetup();
