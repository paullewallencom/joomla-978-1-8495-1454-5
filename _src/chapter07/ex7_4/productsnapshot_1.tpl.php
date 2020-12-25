<?php if( !defined( '_VALID_MOS' ) && !defined( '_JEXEC' ) ) die( 'Direct Access to '.basename(__FILE__).' is not allowed.' ); ?>
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
		// Print the product image or the "no image available" image
		echo ps_product::image_tag( $product_thumb_image, "alt=\"".$product_name."\"");
	?>
</a>
</div>
</div>
