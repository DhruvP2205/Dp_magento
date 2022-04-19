<?php 
class Dp_Product_Model_Observer extends Mage_Core_Model_Abstract
{
    public function callMe(Varien_Event_Observer $observer)
    {
        echo "<pre>";
        echo "Call Me";
        /*$product = $observer->getEvent()->getProduct();
        print_r($product);
        die();*/
    }

    public function beforeRedirect(Varien_Event_Observer $observer)
    {
        echo "<pre>";
        echo "Redirect";
        //die();
    }
}
