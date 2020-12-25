<?php
if( !defined( '_VALID_MOS' ) && !defined( '_JEXEC' ) ) die( 'Direct Access to '.basename(__FILE__).' is not allowed.' );
class ps_product extends vm_ps_product {

	function get_price($product_id, $check_multiple_prices=false, $overrideShopperGroup='' ) {
		$price =parent::get_price ($product_id, $check_multiple_prices, $overrideShopperGroup);
		if ($this->get_field($product_id,'product_special')=='Y') {
			$price["product_price"] *= 0.5;
			$price["product_base_price"] *= 0.5;
		}
		return $price;
	}

}
