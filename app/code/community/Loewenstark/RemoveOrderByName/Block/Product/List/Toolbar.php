<?php

class Loewenstark_RemoveOrderByName_Block_Product_List_Toolbar
extends Mage_Catalog_Block_Product_List_Toolbar {

    protected $_unset_order = array();
    
    /**
     * @see Mage_Catalog_Block_Product_List_Toolbar::removeOrderFromAvailableOrders($order)
     *
     * @return Loewenstark_RemoveOrderByName_Block_Product_List_Toolbar
     **/
    public function removeOrderFromAvailableOrders($order)
    {
        $this->_unset_order[] = $order;
        return $this;
    }
    
    /**
     * @see Mage_Catalog_Block_Product_List_Toolbar::getAvailableOrders()
     *
     * @return array
     **/
    public function getAvailableOrders()
    {
        $availableOrder = parent::getAvailableOrders();
        if( !empty( $this->_unset_order ) && is_array($this->_unset_order) ) {
            foreach( $this->_unset_order as $order ) {
                if (isset($availableOrder[$order])) {
                    unset($availableOrder[$order]);
                }
            }
        }
        return $availableOrder;
    }

}