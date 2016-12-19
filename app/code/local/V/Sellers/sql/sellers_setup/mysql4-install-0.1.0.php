<?php
$installer = $this;
$installer->startSetup();
$installer->run("

CREATE TABLE {$this->getTable('sellers_userdata')} (
  `autoid` smallint(6) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zip` text NOT NULL, 
  `category` text NOT NULL, 
  `status` int(2) NOT NULL,
  `createdat` datetime NULL,
  PRIMARY KEY (`autoid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
    ");

$installer->endSetup(); 
