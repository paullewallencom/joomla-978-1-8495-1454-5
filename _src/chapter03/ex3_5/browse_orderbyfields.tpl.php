<?php if( !defined( '_VALID_MOS' ) && !defined( '_JEXEC' ) ) die( 'Direct Access to '.basename(__FILE__).' is not allowed.' );
mm_showMyFileName(__FILE__); ?>

<?php
if( sizeof($VM_BROWSE_ORDERBY_FIELDS) < 2 ) {
	return;
}
?>
<?php echo $VM_LANG->_('PHPSHOP_ORDERBY') ?>: 
<script language="javascript" type="text/javascript">
	function submit_orderby(option) {
		var frm = document.forms["order"];
		frm.orderby.value=option;
		frm.submit();
	}
</script>
<style type="text/css">
	#orderby_options {display:inline;}
	#orderby_options a {padding:1px 3px;}
</style>
<div id="orderby_options">
	<input type="hidden" name="orderby" value="" />
<?php
// SORT BY PRODUCT LIST
if( in_array( 'product_list', $VM_BROWSE_ORDERBY_FIELDS)) { ?>
   <a href="javascript:void(0)" onclick="submit_orderby('product_list')">
   <?php echo $VM_LANG->_('PHPSHOP_DEFAULT') ?></a>
<?php
}
// SORT BY PRODUCT NAME
if( in_array( 'product_name', $VM_BROWSE_ORDERBY_FIELDS)) { ?>
   <a href="javascript:void(0)" onclick="submit_orderby('product_name')">
   <?php echo $VM_LANG->_('PHPSHOP_PRODUCT_NAME_TITLE') ?></a>
<?php
}
// SORT BY PRODUCT SKU
if( in_array( 'product_sku', $VM_BROWSE_ORDERBY_FIELDS)) { ?>
   <a href="javascript:void(0)" onclick="submit_orderby('product_sku')">
   <?php echo $VM_LANG->_('PHPSHOP_CART_SKU') ?></a>
<?php
}
// SORT BY PRODUCT PRICE
if (_SHOW_PRICES == '1' && $auth['show_prices'] && in_array('product_price', $VM_BROWSE_ORDERBY_FIELDS)) { ?>
   <a href="javascript:void(0)" onclick="submit_orderby('product_price')">
   <?php echo $VM_LANG->_('PHPSHOP_PRODUCT_PRICE_TITLE') ?></a>
<?php
}
// SORT BY PRODUCT CREATION DATE
if( in_array( 'product_cdate', $VM_BROWSE_ORDERBY_FIELDS)) { ?>
   <a href="javascript:void(0)" onclick="submit_orderby('product_cdate')">
   <?php echo $VM_LANG->_('PHPSHOP_LATEST') ?></a>
<?php
}
?>
</div>
