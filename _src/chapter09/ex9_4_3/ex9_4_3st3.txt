<?php if( !defined( '_VALID_MOS' ) && !defined( '_JEXEC' ) ) die( 'Direct Access to '.basename(__FILE__).' is not allowed.' );
mm_showMyFileName(__FILE__);
 ?>
 <img src="components/com_virtuemart/shop_image/category_banner_<?php echo $category_id ?>.jpg" /> <br />
<?php echo $buttons_header // The PDF, Email and Print buttons ?>

<?php
if( $this->get_cfg( 'showPathway' )) {
	echo "<div class=\"pathway\">$navigation_pathway</div>";
}
if( $this->get_cfg( 'product_navigation', 1 )) {
	if( !empty( $previous_product )) {
		echo '<a class="previous_page" href="'.$previous_product_url.'">'.shopMakeHtmlSafe($previous_product['product_name']).'</a>';
	}
	if( !empty( $next_product )) {		
		echo '<a class="next_page" href="'.$next_product_url.'">'.shopMakeHtmlSafe($next_product['product_name']).'</a>';
	}
}
?>
<br style="clear:both;" />
<?php
	echo $this->insertJoomlaArticle(46);
?>
<table border="0" style="width: 100%;">
  <tbody>
	<tr>
<?php  if( $this->get_cfg('showManufacturerLink') ) { $rowspan = 3; } else { $rowspan = 2; } ?>
	  <td width="33%" rowspan="<?php echo $rowspan; ?>" valign="top"><br/>
<?php
	$thumb_width=100;
	$thumb_height=100;
	$thumb='<img src="components/com_virtuemart/show_image_in_imgtag.php?filename='.$product_full_image
		.'&newxsize='.$thumb_width.'&newysize='.$thumb_height.'" />';
	$product_thumb = preg_replace('/<img [^>]+>/',$thumb,$product_image);
	if ($this->get_cfg('flypageRelection',1)) {
		$product_thumb = str_replace('<img','<img class="reflect"',$product_thumb);
		if (!defined('VM_REFLECTION_SCRIPT_FLYPAGE')) {
			echo '
<script language="javascript" type="text/javascript">
window.addEvent("domready", function() {
	$$($$("img").filter(function(img) { return img.hasClass("reflect"); })).reflect(
	{
		height:'.$this->get_cfg('reflectionHeight',0.5).',
		opacity:0.5
	});
});
</script>
			';
			define ('VM_REFLECTION_SCRIPT_FLYPAGE',1);
		}
	}
	echo $product_thumb;
?><br/><br/><?php echo $this->vmlistAdditionalImages( $product_id, $images ) ?></td>
	  <td rowspan="1" colspan="2">
	  <h1><?php echo $product_name ?> <?php echo $edit_link ?></h1>
	<?php 
		$product_rating = ps_reviews::allvotes( $product_id );
		echo $product_rating . '<br />';
   	echo $product_price_lbl;
    echo $product_price;
	?><br />
		<br /><?php echo $addtocart ?>
	  </td>
	</tr>
	<?php if( $this->get_cfg('showManufacturerLink')) { ?>
		<tr>
		  <td rowspan="1" colspan="2"><?php echo $manufacturer_link ?><br /></td>
		</tr>
	<?php } ?>
	<tr>
	  <td colspan="2"><?php echo $ask_seller ?></td>
	</tr>
	<tr>
      <td colspan="3">
	{tab=dimension}
  		Weight: <?php echo number_format($product_weight,1) . ' ' . $product_weight_uom ?><br />
		Size: <?php echo number_format($product_length,2) . ' ' . $product_lwh_uom ?><br />
		Stock: <?php echo $product_in_stock ?><br />
        <?php echo $product_packaging ?><br />
	{tab=description}
	  	<?php echo $product_description ?><br/>
	{tab=reviews}
		<?php echo $product_reviews ?><br />
		<?php echo $product_reviewform ?><br />
	{/tabs}
	  </td>
	</tr>
  </tbody>
</table>
<?php 
if( !empty( $recent_products )) { ?>
	<div class="vmRecent">
	<?php echo $recent_products; ?>
	</div>
<?php 
}
if( !empty( $navigation_childlist )) { ?>
	<?php echo $VM_LANG->_('PHPSHOP_MORE_CATEGORIES') ?><br />
	<?php echo $navigation_childlist ?><br style="clear:both"/>
<?php 
} ?>
