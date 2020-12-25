<?php
if( !defined( '_VALID_MOS' ) && !defined( '_JEXEC' ) ) die( 'Direct Access to '.basename(__FILE__).' is not allowed.' ); 
?>
<table width=100% border=0 cellpadding=2 cellspacing=0 class="Stil1">
  <tr> 
<td colspan="2">
      <b><?php echo $VM_LANG->_('PHPSHOP_ORDER_PRINT_SHIP_TO_LBL') ?></b>
    </td>
  </tr>
  <?php
  foreach( $shippingfields as $field ) {
    if( $field->name == 'email') $field->name = 'user_email';
    if( $field->type == 'delimiter') { ?>
  <tr class="Stil1"> 
<td colspan="2">
  <b class="Stil1"><?php echo $VM_LANG->_($field->title) ? $VM_LANG->_($field->title) : $field->title ?></b>
</td>
  </tr>
  <?php 
    } else { ?>
  <tr class="Stil1"> 
<td>
  <?php echo $VM_LANG->_($field->title) ? $VM_LANG->_($field->title) : $field->title ?>:
</td>
<td>
  <?php 
      switch($field->name) {
        case 'country':
          require_once(CLASSPATH.'ps_country.php');
          $country = new ps_country();
          $dbc = $country->get_country_by_code($dbst->f($field->name));
          if( $dbc !== false ) echo $dbc->f('country_name');
        break;
        default: 
          echo $dbst->f($field->name);
        break;
      }
  ?>
    </td>
  </tr>
  <?php 
    } ?>
  <?php
  } 
  ?>
</table>
