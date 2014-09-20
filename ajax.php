<?php
/*
 * Created by Satz(sathish.thi@gmail.com)
 */
require_once(dirname(__FILE__).'../../../config/config.inc.php');
require_once(dirname(__FILE__).'../../../init.php');
require_once(dirname(__FILE__).'/pincode/pincode.php');

$pincode = new Pincode((int)Tools::getValue('pincode'));
echo json_encode($pincode->CheckCodAvailability());