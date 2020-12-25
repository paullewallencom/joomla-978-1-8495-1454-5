<?php
if( !defined( '_VALID_MOS' ) && !defined( '_JEXEC' ) ) die( 'Direct Access to '.basename(__FILE__).' is not allowed.' ); 
?>
 <table width=100% cellspacing=0 cellpadding=2 border=0>
	<tr align=left class="Stil1">
		<th><?php echo $VM_LANG->_('PHPSHOP_CART_QUANTITY') ?></th>
		<th><?php echo $VM_LANG->_('PHPSHOP_CART_NAME') ?></th>
		<th><?php echo $VM_LANG->_('PHPSHOP_CART_SKU') ?></th>
		<th><?php echo $VM_LANG->_('PHPSHOP_CART_PRICE') ?></th>
		<th><?php echo $VM_LANG->_('PHPSHOP_CART_SUBTOTAL') ?></th>
	</tr>
<?php
// CREATE THE LIST WITH ALL ORDER ITEMS
$order_items = "";
$sub_total = 0.00;
while($dboi->next_record()) {
	$my_qty = $dboi->f("product_quantity");
	if ($auth["show_price_including_tax"] == 1) {
		$price = $dboi->f("product_final_price");
		$my_price = $CURRENCY_DISPLAY->getFullValue($dboi->f("product_final_price"), '', $db->f('order_currency'));
	} else {
		$price = $dboi->f("product_item_price");
		$my_price = $CURRENCY_DISPLAY->getFullValue($dboi->f("product_item_price"), '', $db->f('order_currency'));
	}
	$my_subtotal = $my_qty * $price;
	$sub_total += $my_subtotal;
	?>
	<tr class="Stil1">
		<td><?php echo $my_qty ?></td>
		<td><?php $dboi->p("product_name")?> <?php echo ($dboi->f("product_attribute") ? ' ('.$dboi->f("product_attribute").')' : ''); ?></td>
		<td><?php echo $ps_product->get_field($dboi->f("product_id"), "product_sku") ?></td>
		<td><?php echo $my_price ?></td>
		<td><?php echo $CURRENCY_DISPLAY->getFullValue($my_subtotal, '', $db->f('order_currency')) ?></td>
	</tr>
	<?php
}
?> 
	<tr class="Stil1"> 
		<td colspan=4 align=right>&nbsp;&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
     <tr class="Stil1"> 
     	<td colspan=4 align=right><?php echo $VM_LANG->_('PHPSHOP_ORDER_PRINT_SUBTOTAL') ?> :</td>
         <td><?php echo $order_subtotal ?></td>
	</tr>
        <?php
        // DISCOUNT HANDLING			
		if ( PAYMENT_DISCOUNT_BEFORE == '1') {
			if ($order_discount > 0 || $order_discount < 0) {
					?>
	<tr class="Stil1">
		<td align="right" colspan="4">
				<?php echo $order_discount_lbl ?>: 
		</td>
		<td>
				<?php echo $order_discount_plusminus .' '. $CURRENCY_DISPLAY->getFullValue(abs($order_discount), '', $db->f('order_currency')) ?>
		</td>
	</tr>
		<?php
			}
			if ($coupon_discount > 0 || $coupon_discount < 0) {
				?>
	<tr class="Stil1">
		<td align="right" colspan="4"><?php echo $VM_LANG->_('PHPSHOP_COUPON_DISCOUNT') ?>: </td>
		<td><?php echo $coupon_discount_plusminus. ' '.$CURRENCY_DISPLAY->getFullValue(abs($coupon_discount), '', $db->f('order_currency')) ?></td>
	</tr>
		<?php
			}
		}
		?>
	<tr class="Stil1"> 
		<td colspan=4 align=right><?php echo $VM_LANG->_('PHPSHOP_ORDER_PRINT_SHIPPING') ?> :</td>
 		<td><?php echo $order_shipping ?></td>
	</tr>
	<tr class="Stil1"> 
 		<td colspan=4 align=right><?php echo $VM_LANG->_('PHPSHOP_ORDER_PRINT_TOTAL_TAX') ?> :</td>
         <td><?php echo $order_tax ?></td>
	</tr>
	<tr class="Stil1"> 
    	<td colspan=4 align=right><?php echo $VM_LANG->_('PHPSHOP_ORDER_PRINT_SHIPPING_TAX') ?> :</td>
         <td><?php echo $shipping_tax ?></td>
	</tr>
        <?php
		if ( PAYMENT_DISCOUNT_BEFORE != '1') {
			if ($order_discount > 0 || $order_discount < 0) {
			?>
	<tr class="Stil1">
		<td align="right" colspan="4"><?php echo $order_discount_lbl ?>: </td>
		<td> <?php echo $order_discount_plusminus .' '. $CURRENCY_DISPLAY->getFullValue(abs($order_discount), '', $db->f('order_currency')) ?></td>
	</tr>
			<?php
			}
			if ($coupon_discount > 0 || $coupon_discount < 0) {
				?>
	<tr class="Stil1">
		<td align="right" colspan="4"><?php echo $VM_LANG->_('PHPSHOP_COUPON_DISCOUNT') ?>: </td>
		<td><?php echo $coupon_discount_plusminus. ' '.$CURRENCY_DISPLAY->getFullValue(abs($coupon_discount), '', $db->f('order_currency')) ?></td>
	</tr>
				<?php
			}
		}
		?>
     <tr class="Stil1"> 
     	<td colspan=4 align=right><b><?php echo $VM_LANG->_('PHPSHOP_CART_TOTAL') .": " ?></b></td>
         <td><?php echo $order_total ?></td>
	</tr>
</table>
