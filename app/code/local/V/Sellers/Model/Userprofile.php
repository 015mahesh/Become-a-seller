<?php
class V_Sellers_Model_Userprofile extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('sellers/userprofile');
    }
	
	public function saveBecomeAseller($wholedata)
	{

		$cat_str=implode(",", $wholedata['category']);;
		//print_r($cat_str);die;

		$status=1;
		$date=date("Y-m-d H:i:s", Mage::getModel('core/date')->timestamp(time()));
		$collection=Mage::getModel('sellers/userprofile');
		$collection->setData($wholedata);
		$collection->setstatus($status);
		$collection->setcreatedat($date);
		$collection->setcategory($cat_str);
		$collection->save();

		//Send email to Admin start
		$emailTemp = Mage::getModel('core/email_template')->loadDefault('become_a_seller');
		
		$emailTempVariables = array();				
		$adminEmail=Mage::getStoreConfig('trans_email/ident_general/email');
		$adminUsername = 'Admin';
		$emailTempVariables['name'] = $wholedata['name'];
		$emailTempVariables['email'] = $wholedata['email'];
		
		$processedTemplate = $emailTemp->getProcessedTemplate($emailTempVariables);
		
		$emailTemp->setSenderName($wholedata['name']);
		$emailTemp->setSenderEmail($wholedata['email']);
		$emailTemp->send($adminEmail,$adminUsername,$emailTempVariables);	
		//Send email to Admin end

	}

}
