<?php
if( !defined( '_VALID_MOS' ) && !defined( '_JEXEC' ) ) die( 'Direct Access to '.basename(__FILE__).' is not allowed.' ); 
?>
<table width="100%" align="center" border="0" cellspacing="0" cellpadding="10">
  <tr valign="top"> 
<td width=53% align="left" class="Stil1">
      <?php echo ps_vendor::formatted_store_address(true) ?>
 </td>
 <td width="47%" align="right">
      <img src="cid:vendor_image" alt="vendor_image" border="0" />
 </td>
  </tr>
  <tr>
<td colspan="2" class="Stil1">
  <?php echo $order_header_msg ?>
</td>
  </tr>    
  <tr bgcolor="white"> 
    <td colspan="2">
      <h3 class="Stil2"><?php echo $VM_LANG->_('PHPSHOP_ORDER_PRINT_PO_LBL') ?>
      </h3>
    </td>
  </tr>
</table>
