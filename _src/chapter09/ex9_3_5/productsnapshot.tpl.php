<?php if( !defined( '_VALID_MOS' ) && !defined( '_JEXEC' ) ) die( 'Direct Access to '.basename(__FILE__).' is not allowed.' ); ?>

<?php 
	$myTemplate = $_REQUEST['productsnapshot_template'];
	if ($myTemplate!='productsnapshot.tpl' && file_exists(dirname(__FILE__).'/'.$myTemplate.'.php')) {
		include (dirname(__FILE__).'/'.$myTemplate.'.php');
		return;
	}
?>
<?php if (!defined('PRODUCTSNAPSHOT_CSS')) { 
	define('PRODUCTSNAPSHOT_CSS',1);
?> 
<style type="text/css">
 .productsnapshot_container {
	padding:5px;
	border:1px solid #ccc
}
.productsnapshot_container div {
	text-align:center !important;
}
</style>
<?php } ?>
<div class="productsnapshot_container">
<!-- The product name DIV. -->
 <?php if( $show_product_name ) : ?>
<div>
<a title="<?php echo $product_name ?>" href="<?php echo $product_link ?>"><?php echo $product_name; ?></a>
<br />
</div>
<?php endif;?>

<!-- The product image DIV. -->
<div>
<a title="<?php echo $product_name ?>" href="<?php echo $product_link ?>">
	<?php 
	$image_attribute = 'alt="'.$product_name.'"';
	if ($this->get_cfg('snapshotRelection',1)) {
		$image_attribute = 'class="reflectSnapshot" '.$image_attribute; 
		if (!defined('VM_REFLECTION_SCRIPT_SNAPSHOT ')) {
			echo '
<script language="javascript" type="text/javascript">
window.addEvent("domready", function() {
	$$($$("img").filter(function(img) { return img.hasClass("reflectSnapshot "); })).reflect(
	{
		height:'.$this->get_cfg('reflectionHeight',0.5).',
		opacity:0.5
	});
});
</script>
			';
			define ('VM_REFLECTION_SCRIPT_SNAPSHOT',1);
		}
	}

		// Print the product image or the "no image available" image
		echo ps_product::image_tag( $product_thumb_image, $image_attribute);
	?>
</a>
</div>

<?php
		echo '<div>Weight: ';
		$product_weight=ps_product::get_field( $product_id,'product_weight'); 
		$product_weight_uom=ps_product::get_field( $product_id,'product_weight_uom'); 
		echo number_format($product_weight,1).' '.$product_weight_uom;
		echo '</div>';
?>
<!-- The product price DIV. -->
<div style="width: 100%;float:left;text-align:center;">
<?php
if( !empty($price) ) {
	echo $price;
}
?>
</div>

<!-- The add to cart DIV. -->
<div style="float:left;text-align:center;width: 100%;">
<?php
if( !empty($addtocart_link) ) {
	?>
	<br />
	<form action="<?php echo  $mm_action_url ?>index.php" method="post" name="addtocart" id="addtocart">
    <input type="hidden" name="option" value="com_virtuemart" />
    <input type="hidden" name="page" value="shop.cart" />
    <input type="hidden" name="Itemid" value="<?php echo ps_session::getShopItemid(); ?>" />
    <input type="hidden" name="func" value="cartAdd" />
    <input type="hidden" name="prod_id" value="<?php echo $product_id; ?>" />
    <input type="hidden" name="product_id" value="<?php echo $product_id ?>" />
    <input type="hidden" name="quantity" value="1" />
    <input type="hidden" name="set_price[]" value="" />
    <input type="hidden" name="adjust_price[]" value="" />
    <input type="hidden" name="master_product[]" value="" />
    <input type="submit" class="addtocart_button_module" value="<?php echo $VM_LANG->_('PHPSHOP_CART_ADD_TO') ?>" title="<?php echo $VM_LANG->_('PHPSHOP_CART_ADD_TO') ?>" />
    </form>
	<br />
	<?php
}
?>

</div>
<br style="clear:both" />
</div>
