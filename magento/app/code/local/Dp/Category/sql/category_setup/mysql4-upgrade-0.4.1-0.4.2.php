<?php
$installer = $this;
$installer->startSetup();
$installer->getConnection()->addColumn(
    $this->getTable('category'),//table name
    'status',      //column name
    "tinyint(1) NOT NULL DEFAULT '1'"  //datatype definition
    );
$installer->endSetup();
