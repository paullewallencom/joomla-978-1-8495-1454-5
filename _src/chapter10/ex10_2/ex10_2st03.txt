<?php
if( !defined( '_VALID_MOS' ) && !defined( '_JEXEC' ) ) die( 'Direct Access to '.basename(__FILE__).' is not allowed.' ); 
?>
  <tr bgcolor="#CCCCCC" class="sectiontableheader"> 
    <td colspan="2" class="Stil2">
  <b><?php echo $VM_LANG->_('PHPSHOP_ACC_ORDER_INFO') ?></b>
    </td>
  </tr>
  <tr class="Stil1"> 
<td>
  <?php echo $VM_LANG->_('PHPSHOP_ORDER_PRINT_PO_NUMBER')?>:
</td>
<td>
  <?php echo $order_id ?>
    </td>
  </tr>
  <tr class="Stil1"> 
<td>
  <?php echo $VM_LANG->_('PHPSHOP_ORDER_PRINT_PO_DATE') ?>:
</td>
<td>
  <?php echo $order_date ?>
</td>
  </tr>
  <tr class="Stil1"> 
<td>
  <?php echo $VM_LANG->_('PHPSHOP_ORDER_PRINT_PO_STATUS') ?>:</td><td><?php echo $order_status ?>
</td>
  </tr>
