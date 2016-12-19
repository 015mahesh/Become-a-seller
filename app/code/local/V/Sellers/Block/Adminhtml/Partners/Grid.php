<?php
class V_Sellers_Block_Adminhtml_Partners_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
	public function __construct()
	{
		  parent::__construct();
		  $this->setId('sellersGrid');
		  $this->setDefaultSort('autoid');
		  $this->setDefaultDir('ASC');
		  $this->setSaveParametersInSession(true);
		  $this->setUseAjax(true);
          $this->setVarNameFilter('product_filter');
	}

	protected function _prepareCollection(){
		$collectionfetch = Mage::getModel('sellers/userprofile')->getCollection();
        $this->setCollection($collectionfetch);
 
        parent::_prepareCollection();  
    }
	
	protected function _prepareColumns(){
        $this->addColumn('autoid', array(
            'header'    => Mage::helper('customer')->__('ID'),
            'width'     => '50px',
            'index'     => 'autoid',
            'type'  => 'number'
        ));
        $this->addColumn('name', array(
            'header'    => Mage::helper('customer')->__('Seller Name'),
            'index'     => 'name',
        ));
        $this->addColumn('email', array(
            'header'    => Mage::helper('customer')->__('Email'),
            'width'     => '150',
            'index'     => 'email',
        ));
		$this->addColumn('country', array(
            'header'    => Mage::helper('customer')->__('Country'),
            'index'     => 'country',
        ));
		
		$this->addColumn('state', array(
            'header'    => Mage::helper('customer')->__('State'),
            'index'     => 'state',
        ));

        $this->addColumn('zip', array(
            'header'    => Mage::helper('customer')->__('Zip'),
            'index'     => 'zip',
        ));

        $this->addColumn('category', array(
            'header'    => Mage::helper('customer')->__('Category'),
            'index'     => 'category',
        ));

        $this->addColumn('createdat', array(
            'header'    => Mage::helper('customer')->__('Date'),
            'index'     => 'createdat',
        ));

		$this->addExportType('*/*/exportCsv', Mage::helper('sellers')->__('CSV'));
		$this->addExportType('*/*/exportXml', Mage::helper('sellers')->__('XML'));
        return parent::_prepareColumns();
    }

    public function getGridUrl(){
        return $this->getUrl("*/*/grid",array("_current"=>true));
    }

}
