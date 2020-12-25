<?php if( !defined( '_VALID_MOS' ) && !defined( '_JEXEC' ) ) die( 'Direct Access to '.basename(__FILE__).' is not allowed.' );
mm_showMyFileName(__FILE__);
 ?>
 <?php if (!defined(VM_CUSTOM_CSS)) {
	define ('VM_CUSTOM_CSS',1);
?>
	<style>
		.browseProductContainer {border:1px solid #999;padding:5px;background:#eee;margin:5px;}
	</style>
<?php } ?>
<div class="browseProductContainer">
       
       <h3 class="browseProductTitle"><a title="<?php echo $product_name ?>" href="<?php echo $product_flypage ?>">
            <?php echo $product_name ?></a>
        </h3>
        
        <div class="browsePriceContainer">
            <?php echo $product_price ?>
        </div>
        
<?php 
	$image_class = 'class="browseProductImage"';
	if ($this->get_cfg('reflectionBrowse',1)) {
		$image_class = str_replace('class="','class="reflectBrowse ',$image_class); 
		if (!defined('VM_REFLECTION_SCRIPT_BROWSE')) {
			echo '
<script language="javascript" type="text/javascript">
window.addEvent("domready", function() {
	$$($$("img").filter(function(img) { return img.hasClass("reflectBrowse"); })).reflect(
	{
		height:'.$this->get_cfg('reflectionHeight',0.5).',
		opacity:0.5
	});
});
</script>
			';
			define ('VM_REFLECTION_SCRIPT_BROWSE',1);
		}
	}
?> 
        <div class="browseProductImageContainer">
	        <script type="text/javascript">//<![CDATA[
	        document.write('<a href="javascript:void window.open(\'<?php echo $product_full_image ?>\', \'win2\', \'status=no,toolbar=no,scrollbars=yes,titlebar=no,menubar=no,resizable=yes,width=<?php echo $full_image_width ?>,height=<?php echo $full_image_height ?>,directories=no,location=no\');">');
	        document.write( '<?php echo ps_product::image_tag( $product_thumb_image, $image_class . ' border="0" title="'.$product_name.'" alt="'.$product_name .'"' ) ?></a>' );
	        //]]>
	        </script>
	        <noscript>
	            <a href="<?php echo $product_full_image ?>" target="_blank" title="<?php echo $product_name ?>">
	            <?php echo ps_product::image_tag( $product_thumb_image, $image_class.' border="0" title="'.$product_name.'" alt="'.$product_name .'"' ) ?>
	            </a>
	        </noscript>
        </div>
        
        <div class="browseRatingContainer">
        <?php echo $product_rating ?>
        </div>
        <div class="browseProductDescription">
            <?php echo $product_s_desc ?>&nbsp;
 			<br />Weight: <?php echo number_format($product_weight,1) . ' ' . $product_weight_uom ?><br />
           <a href="<?php echo $product_flypage ?>" title="<?php echo $product_details ?>"><br />
			<?php echo $product_details ?>...</a>
        </div>
        <br />
        <span class="browseAddToCartContainer">
        <?php 
			if ($form_addtocart)
				echo $form_addtocart;
			else {
				$button_lbl = $VM_LANG->_('PHPSHOP_CART_ADD_TO');
				$button_cls = 'addtocart_button';
		  ?>
    			<input type="button" class="<?php echo $button_cls ?>" value="<?php echo $button_lbl	?>" title="<?php echo $button_lbl ?>" onclick="location='<?php echo $product_flypage ?>'" />
		  <?php		
			}
		  ?>
        </span>
  <br /><a href="index.php?option=com_virtuemart&page=shop.ask& product_id=<?php echo $product_id ?>">Ask a question about this product</a>

</div>
