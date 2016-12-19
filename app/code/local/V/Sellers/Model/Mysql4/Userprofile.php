<?php
class V_Sellers_Model_Mysql4_Userprofile extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {    
        $this->_init('sellers/userprofile', 'autoid');
    }
}