<?php
if( !defined( '_VALID_MOS' ) && !defined( '_JEXEC' ) ) die( 'Direct Access to '.basename(__FILE__).' is not allowed.' ); 
?>
<html>
<head>
<title><?php echo $VM_LANG->_('PHPSHOP_ORDER_PRINT_PO_LBL') ?></title>
<style type="text/css">
<!--
.Stil1 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 12px;
}
.Stil2 {font-family: Verdana, Arial, Helvetica, sans-serif}
-->
</style>
</head>
<body>

<?php echo $this->fetch( '/order_emails/includes/order_header.tpl.php'); ?> 

<table border=0 cellspacing=0 cellpadding=2 width=100%>
  <!-- begin customer information --> 
	
  <?php echo $this->fetch( '/order_emails/includes/order_info.tpl.php'); ?> 

  <!-- end customer information --> 
  <!-- begin 2 column bill-ship to --> 
  <tr class="sectiontableheader">
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr bgcolor="#CCCCCC" class="sectiontableheader"> 
    <td colspan="2"><b class="Stil2"><?php echo $VM_LANG->_('PHPSHOP_ORDER_PRINT_CUST_INFO_LBL') ?></b></td>
  </tr>
  <tr valign=top> 
    <td width=50%>
		<!-- begin billto -->  
		
  <?php echo $this->fetch( '/order_emails/includes/order_billing_info.tpl.php'); ?> 
		
       	<!-- end billto --> 
    </td>
    <td width=50%> 
    <!-- begin shipto --> 
		
 <?php echo $this->fetch( '/order_emails/includes/order_shipping_info.tpl.php'); ?>
 
       <!-- end shipto --> 
      <!-- end customer information --> </td>
  </tr>
  <tr> 
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr> 
    <td colspan="2"> 
      <table width="100%" border="0" cellspacing="0" cellpadding="1">
         
      </table>
    </td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  <!-- begin order items information --> 
  <tr bgcolor="#CCCCCC" class="Stil2"> 
    <td colspan="2"><b><?php echo $VM_LANG->_('PHPSHOP_ORDER_ITEM') ?></b></td>
  </tr>
  <tr> 
    <td colspan="2"> 
		
<?php echo $this->fetch( '/order_emails/includes/order_item_details.tpl.php'); ?> 

     </td>
  </tr>
  <!-- end order items information --> 
  <!-- begin customer note -->
  <tr class="sectiontableheader">
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr bgcolor="#CCCCCC" class="sectiontableheader">
    <td colspan="2"><b class="Stil2"><?php echo $VM_LANG->_('PHPSHOP_ORDER_PRINT_CUSTOMER_NOTE') ?>:</b></td>
  </tr>
  <tr>
    <td colspan="2">
        <?php echo $customer_note ?>
    </td>

  </tr>
  <tr class="sectiontableheader">
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr bgcolor="#CCCCCC" class="sectiontableheader">
    <td><b class="Stil2"><?php echo $payment_info_lbl ?></b></td>
    <td><b class="Stil2"><?php echo $shipping_info_lbl ?></b></td>
  </tr>
  <tr>
    <td><?php echo $payment_info_details ?></td>
    <td><?php echo $shipping_info_details ?></td>
  </tr>
</table>
<br />
<p class="Stil2"></p>
<p class="Stil2">

<?php echo $this->fetch( '/order_emails/includes/order_footer.tpl.php'); ?> 

</p>
</body>
</html>
