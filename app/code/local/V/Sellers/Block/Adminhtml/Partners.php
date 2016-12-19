<?php
class V_Sellers_Block_Adminhtml_Partners extends Mage_Adminhtml_Block_Widget_Grid_Container
{
  public function __construct()
  {
	$this->_controller = 'adminhtml_partners';
	$this->_headerText = Mage::helper('sellers')->__("Seller's Names");
	$this->_blockGroup = 'sellers';
	parent::__construct();
	$this->_removeButton('add');
	$this->_removeButton('reset_filter_button');
	$this->_removeButton('search_button'); 
  }
}
