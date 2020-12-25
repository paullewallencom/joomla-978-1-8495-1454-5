<?php if( !defined( '_VALID_MOS' ) && !defined( '_JEXEC' ) ) die( 'Direct Access to '.basename(__FILE__).' is not allowed.' ); ?>

<?php
defined( 'vmToolTipCalled') or define('vmToolTipCalled', 1);
echo $vendor_store_desc."<br />";
echo "<br /><h4>".$VM_LANG->_('PHPSHOP_CATEGORIES')."</h4>";
echo $categories; ?>
<?php 
	$db1 = new ps_DB;
	$q1 = "SELECT * 
		FROM #__{vm}_manufacturer
		ORDER BY mf_name
	";
	$db1->query($q1);
	echo '<div><b>Manufacturers</b></div>';
	while ($db1->next_record()) {
		echo '
		<div class="vm_manufacturer" style="float:left;text-align:center;border:1px solid black;margin:5px;padding:2px;">
					<img src="'. IMAGEURL .'manufacturer_logo_'.$db1->f('manufacturer_id').'.png" />
		<br />
          &nbsp;' . $db1->f('mf_name') . '<br />
 		</div>
		';
	}
	echo '<br class="clr" />';
?>
<div class="vmRecent">
<?php echo $recent_products; ?>
</div>
<?php
// Show Featured Products
if( $this->get_cfg( 'showFeatured', 1 )) {
    /* featuredproducts(random, no_of_products,category_based) no_of_products 0 = all else numeric amount
    edit featuredproduct.tpl.php to edit layout */
    echo $ps_product->featuredProducts(true,10,false);
}
// Show Latest Products
if( $this->get_cfg( 'showlatest', 1 )) {
    /* latestproducts(random, no_of_products,month_based,category_based) no_of_products 0 = all else numeric amount
    edit latestproduct.tpl.php to edit layout */
    ps_product::latestProducts(true,10,false,false);
}
?>

<?php if( isset($paypalLogo)) : ?>
<div class="vmRecent" style="padding: 10px; text-align: center;">
	<?php echo $paypalLogo; ?>
</div>
<?php endif; ?>