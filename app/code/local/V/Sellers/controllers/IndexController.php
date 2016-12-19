<?php

class V_Sellers_IndexController extends Mage_Core_Controller_Front_Action {

    /**
     * Index action
     * 
     * @access public
     * @return void
     */
    public function indexAction() {
        $this->loadLayout();     
        $this->renderLayout();
    }

    public function become_a_partnerAction() {

        if($this->getRequest()->isPost()){
            if(!$this->_validateFormKey()) {
                $this->_redirect('sellers/index/');
            }
            list($data, $errors) = $this->validatePost();
            $wholedata=$this->getRequest()->getParams();
            if(empty($errors)){
                $status=Mage::getModel('sellers/userprofile')->saveBecomeAseller($wholedata);
                    Mage::getSingleton('core/session')->addSuccess(Mage::helper('sellers')->__('You have registred as seller successfully, Admin will contact you soon'));
            }   
        }  

      $this->_redirect('sellers/index/');
    }

    public function stateAction() {
        $countrycode = $this->getRequest()->getParam('country');
        $html = "";
        $statearray = Mage::getModel('directory/region')->getResourceCollection()->addCountryFilter($countrycode)->load();
        if(count($statearray) > 0){
            $html .= "<select name='state'><option value=''>--Please Select--</option>";
            foreach ($statearray as $_state) {
                $html .= "<option value='" . $_state->getCode() . "'>" . $_state->getDefaultName() . "</option>";
            }
            $html .= "</select>";
        } else {
            $html .= "<input name='state' id='state' title='".Mage::helper('contacts')->__('State')."' value='' class='input-text' type='text' />";
        }
        echo $html;
    }

    private function validatePost(){
        $errors = array();
        $data = array();
        foreach( $this->getRequest()->getParams() as $code => $value){
            switch ($code) :
                case 'name':
                    if(trim($value) == '' ){$errors[] = Mage::helper('sellers')->__('Name has to be completed');} 
                    else{$data[$code] = $value;}
                    break;

                case 'email':
                    if(trim($value) == '' ){$errors[] = Mage::helper('sellers')->__('Email has to be completed');} 
                    else{$data[$code] = $value;}
                    break;

                case 'country':
                    if(trim($value) == '' ){$errors[] = Mage::helper('sellers')->__('Country has to be completed');} 
                    else{$data[$code] = $value;}
                    break;

                case 'state':
                    if(trim($value) == '' ){$errors[] = Mage::helper('sellers')->__('State has to be completed');} 
                    else{$data[$code] = $value;}
                    break;

                case 'zip':
                    if(trim($value) == '' ){$errors[] = Mage::helper('sellers')->__('Zip has to be completed');} 
                    else{$data[$code] = $value;}
                    break;

                  
            endswitch;
        }
        return array($data, $errors);
    }

}
