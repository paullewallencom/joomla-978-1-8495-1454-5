<?php
if( !defined( '_VALID_MOS' ) && !defined( '_JEXEC' ) ) die( 'Direct Access to '.basename(__FILE__).' is not allowed.' ); 
/**
* This is the default Basket Template. Modify as you like.
*
* @version $Id: basket_b2c.html.php 2409 2010-05-20 20:05:30Z soeren $
* @package VirtueMart
* @subpackage templates
* @copyright Copyright (C) 2004-2005 Soeren Eberhardt. All rights reserved.
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
* VirtueMart is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See /administrator/components/com_virtuemart/COPYRIGHT.php for copyright notices and details.
*
* http://virtuemart.net
*/
// adding thumb image
$db1 = new ps_DB;
$thumb_width=50;
$thumb_height=50;
$frontend_url= str_replace('shop_image/','',IMAGEURL);
for ($i=0;$i<count($product_rows);$i++) {
	$q1 = "SELECT product_full_image 
		FROM #__{vm}_product 
		WHERE product_sku='".$product_rows[$i]['product_sku']."'
	";
	$db1->setQuery($q1);
	$product_image=$db1->loadResult();	$product_rows[$i]['product_thumb']='<img src="'.$frontend_url.'show_image_in_imgtag.php?filename='.$product_image
		.'&newxsize='.$thumb_width.'&newysize='.$thumb_height.'" />';
}
?>
<table width="100%" cellspacing="2" cellpadding="4" border="0">
  <tr align="left" class="sectiontableheader">
        <th><?php echo $VM_LANG->_('PHPSHOP_CART_NAME') ?></th>
        <th><?php echo $VM_LANG->_('PHPSHOP_CART_SKU') ?></th>
      <th><?php echo 'Thumbnail'; ?></th>
	<th><?php echo $VM_LANG->_('PHPSHOP_CART_PRICE') ?></th>
	<th><?php echo $VM_LANG->_('PHPSHOP_CART_QUANTITY') ?> / <?php echo $VM_LANG->_('PHPSHOP_CART_ACTION') ?></th>
	<th><?php echo $VM_LANG->_('PHPSHOP_CART_SUBTOTAL') ?></th>
  </tr>
<?php foreach( $product_rows as $product ) { ?>
 <?php
// use ajax to update cart if on shop cart page
if ($_REQUEST['page']=='shop.cart') {
	$product['update_form']=str_replace('<form ',
			'<form onsubmit="handleUpdateCart( this );return false;"',
			$product['update_form']);
}
?>
 <tr valign="top" class="<?php echo $product['row_color'] ?>">
	<td><?php echo $product['product_name'] . $product['product_attributes'] ?></td>
	<td><?php echo $product['product_sku'] ?></td>
	<td><?php echo $product['product_thumb'] ?></td>;
	<td align="right"><?php echo $product['product_price'] ?></td>
	<td><?php echo $product['update_form'] ?>
		<?php echo $product['delete_form'] ?>
	</td>
    <td align="right"><?php echo $product['subtotal'] ?></td>
  </tr>
<?php } ?>
<!--Begin of SubTotal, Tax, Shipping, Coupon Discount and Total listing -->
  <tr class="sectiontableentry1">
    <td colspan="4" align="right"><?php echo $VM_LANG->_('PHPSHOP_CART_SUBTOTAL') ?>:</td> 
    <td colspan="3" align="right"><?php echo $subtotal_display ?></td>
  </tr>
<?php if( $discount_before ) { ?>
  <tr class="sectiontableentry1">
    <td colspan="4" align="right"><?php echo $VM_LANG->_('PHPSHOP_COUPON_DISCOUNT') ?>:
    </td> 
    <td colspan="3" align="right"><?php echo $coupon_display ?></td>
  </tr>
<?php } 
if( $shipping ) { ?>
  <tr class="sectiontableentry1">
	<td colspan="4" align="right"><?php echo $VM_LANG->_('PHPSHOP_ORDER_PRINT_SHIPPING') ?>: </td> 
	<td colspan="3" align="right"><?php echo $shipping_display ?></td>
  </tr>
<?php } 
if($discount_after) { ?>
  <tr class="sectiontableentry1">
    <td colspan="4" align="right"><?php echo $VM_LANG->_('PHPSHOP_COUPON_DISCOUNT') ?>:
    </td> 
    <td colspan="3" align="right"><?php echo $coupon_display ?></td>
  </tr>
<?php } ?>
  <tr>
    <td colspan="4">&nbsp;</td>
    <td colspan="3"><hr /></td>
  </tr>
  <tr class="sectiontableentry1">
    <td colspan="4" align="right"><?php echo $VM_LANG->_('PHPSHOP_ORDER_PRINT_TOTAL') ?>: </td>
    <td colspan="3" align="right"><strong><?php echo $order_total_display ?></strong></td>
  </tr>
<?php if ( $show_tax ) { ?>
  <tr class="sectiontableentry1">
        <td colspan="4" align="right" valign="top"><?php echo $VM_LANG->_('PHPSHOP_ORDER_PRINT_TOTAL_TAX') ?>: </td> 
        <td colspan="3" align="right"><?php echo $tax_display ?></td>
  </tr>
<?php } ?>
  <?php if(isset($paypal_express_button)) : ?>
   <tr>
    <td colspan="4" align="right"><?php echo $paypal_express_button; ?>
    </td>
  </tr> 
  <?php endif; ?>
  <tr>
    <td colspan="7"><hr /></td>
  </tr>
</table>
