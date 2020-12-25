<?php
if( !defined( '_VALID_MOS' ) && !defined( '_JEXEC' ) ) die( 'Direct Access to '.basename(__FILE__).' is not allowed.' ); 
?>
<table width=100% cellspacing=0 cellpadding=2 border=0>
  <?php
  foreach( $registrationfields as $field ) {
    if( $field->name == 'email') $field->name = 'user_email';
    if( $field->name == 'delimiter_sendregistration') continue;
    if( $field->type == 'captcha') continue;
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
          $dbc = $country->get_country_by_code($dbbt->f($field->name));
          if( $dbc !== false ) 
            echo $dbc->f('country_name');
				break;
        default: 
          echo $dbbt->f($field->name);
				break;
      }
	 ?>
    </td>
  </tr>
<?php 
    }
?>
<?php
  } 
?>
</table>
