<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Pincode
 *
 * @author satz
 */

class Pincode{
    protected $pincode =null;
    
    public function __construct($pincode) {
        $this->pincode =$pincode;
    }
    
    public function CheckCodAvailability(){        
        if(!$this->Validate($this->pincode))
        {
          $json = array(
            'result'=>false,
            'msg'   =>'Invalid Postal code'  
          );
          return json_encode($json);
        }
        else{
            if($this->getPincode()>0){
                $json = array(
            'result'=>true,
            'msg'   =>'COD(Cash on Delivery) Available'  
          );
          return json_encode($json);
            }
            else{
                $json = array(
            'result'=>false,
            'msg'   =>'COD(Cash on Delivery)Not Available'  
          );
          return json_encode($json);
            }
        }
    }
    /*
     * Validate for India Pincode
     */
    protected function Validate()
    {
        return preg_match('/^\d{3}\s?\d{3}$/    ',$this->pincode);
    }
    protected function getPincode(){
        $sql = 'SELECT COUNT(*) FROM '._DB_PREFIX_.'pincode WHERE pincode ='.$this->pincode;
        $totalCount = Db::getInstance()->getValue($sql);
        return $totalCount;
    }
}
