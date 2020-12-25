<?php if( !defined( '_VALID_MOS' ) && !defined( '_JEXEC' ) ) die( 'Direct Access to '.basename(__FILE__).' is not allowed.' );

if($empty_cart) { ?>
    
    <div style="margin: 0 auto;">
    <?php if(!$vmMinicart) { ?>
        <a href="http://virtuemart.net/" target="_blank">
        <img src="<?php echo $mm_action_url ?>components/com_virtuemart/shop_image/ps_image/menu_logo.gif" alt="VirtueMart" width="80" border="0" /></a>
        <br />
    <?php }
    echo $VM_LANG->_('PHPSHOP_EMPTY_CART') ?>
    </div>
<?php } 
else {
?>
		<style type="text/css">
			.visibleCart {
				display:block;
				border:1px solid black;
				padding:2px;
				position:absolute;
				background:white;
				width:150px
			}
			.hiddenCart {
				display:none
			}
			#vm_cart_button {
				background:#333; 
				border:1px solid black;
				color:white;
				padding:2px;
				cursor:auto;
				width:150px
			}
		</style>
		<script language="javascript" type="text/javascript">
			function ToggleCart() {
				var myCart = $("vm_cart_dropdown");
				if (myCart.className=="hiddenCart") myCart.className="visibleCart";
				else myCart.className="hiddenCart";
			}
		</script>
		<div id="vm_cart_button" onclick="ToggleCart()">Mini Cart</div>
		<div id="vm_cart_dropdown" class="hiddenCart">
<?php 
		// Loop through each row and build the table
    foreach( $minicart as $cart ) { 		

		foreach( $cart as $attr => $val ) {
			// Using this we make all the variables available in the template
			// translated example: $this->set( 'product_name', $product_name );
			$this->set( $attr, $val );
		}
        if(!$vmMinicart) { // Build Minicart
            ?>
            <div style="float: left;">
            <?php echo $cart['quantity'] ?>&nbsp;x&nbsp;<a href="<?php echo $cart['url'] ?>"><?php echo $cart['product_name'] ?></a>
            </div>
            <div style="float: right;">
            <?php echo $cart['price'] ?>
            </div>
            <br style="clear: both;" />
            <?php echo $cart['attributes'];
        }
    }
}
if(!$vmMinicart) { ?>
    <hr style="clear: both;" />
<?php } ?>
<div style="float: left;" >
<?php echo $total_products ?>
</div>
<div style="float: right;">
<?php echo $total_price ?>
</div>
<?php if (!$empty_cart && !$vmMinicart) { ?>
    <br/><br style="clear:both" /><div align="center">
    <?php echo $show_cart ?>
	<?php
		$checkout_link=str_replace(
			'page=shop.cart',
			'page=checkout.index',
			$show_cart);
		$checkout_link=str_replace(
			$VM_LANG->_('PHPSHOP_CART_SHOW'),
			$VM_LANG->_('PHPSHOP_CHECKOUT_TITLE'),
			$checkout_link);
		echo '&nbsp;&nbsp;'.$checkout_link;
	?>
    </div><br/>
</div>
	
<?php } 
echo $saved_cart;
?>