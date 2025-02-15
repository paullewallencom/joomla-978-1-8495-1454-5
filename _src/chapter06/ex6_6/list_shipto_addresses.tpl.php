<?php
if( !defined( '_VALID_MOS' ) && !defined( '_JEXEC' ) ) die( 'Direct Access to '.basename(__FILE__).' is not allowed.' ); 
/**
*
* @version $Id: list_shipto_addresses.tpl.php 1725 2009-04-21 09:10:34Z soeren_nb $
* @package VirtueMart
* @subpackage templates
* @copyright Copyright (C) 2007-2009 Soeren Eberhardt. All rights reserved.
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
* VirtueMart is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See /administrator/components/com_virtuemart/COPYRIGHT.php for copyright notices and details.
*
* http://virtuemart.net
*/

?>
<table id=”vmAddressTable” border="0" width="100%" cellpadding="2" cellspacing="0">
	<tr class="sectiontableentry1">
		<td>
<?php
$checked = '';
$display='class="label_address"';
if( $bt_user_info_id == $value || empty($value)) {
	$checked = 'checked="checked" ';
	$display = 'class="label_address_active"';
}
echo '<input onclick="ToggleAddresses(this)" type="radio" name="'.$name.'" id="'.$bt_user_info_id.'" value="'.$bt_user_info_id.'" '.$checked.'/>'."\n";
echo 'default';
$html = '<label '.$display.' id="label_'.$bt_user_info_id.'" for="'.$bt_user_info_id.'">'
	.$VM_LANG->_('PHPSHOP_ACC_BILL_DEF').'</label>
';
while($db->next_record()) {
	$checked = '';
	$display='class="label_address"';
	if ( $value == $db->f("user_info_id")) {
		$checked = 'checked="checked" ';
		$display = 'class="label_address_active"';
	}
	echo '<br /><input onclick="ToggleAddresses(this)" type="radio" name="'
		.$name.'" id="' . $db->f("user_info_id") . '" value="' 
		. $db->f("user_info_id") . '" '.$checked.' />'."\n";
	echo '<strong>' . $db->f("address_type_name") . "</strong> ";
	ob_start();
	echo '<label '.$display.' id="label_'.$db->f("user_info_id").'" for="'.$db->f("user_info_id") . '">';
			
	echo $db->f("title") . " ". $db->f("first_name") . " ". $db->f("middle_name") . " ". $db->f("last_name") . "\n";
	echo '<br />'."\n";
	if ($db->f("company")) {
		echo $db->f("company") . "<br />\n";
	}
	echo $db->f("address_1") . "\n";
	if ($db->f("address_2")) {
		echo '<br />'. $db->f("address_2"). "\n";
	}
	echo '<br />'."\n";
	echo $db->f("city");
	echo ', ';
	// for state, can be used: state_name, state_2_code, state_3_code
	echo $db->f("state_2_code") . " ";
	echo $db->f("zip") . "<br />\n";
	// for country, can be used: country_name, country_2_code, country_3_code
	// (not displayed in default template)
	echo $VM_LANG->_('PHPSHOP_CHECKOUT_CONF_PHONE').': '. $db->f("phone_1") . "\n";
	echo '<br />'."\n";
	echo $VM_LANG->_('PHPSHOP_CHECKOUT_CONF_FAX').': '.$db->f("fax") . "\n";
	echo '<br />'."\n";
	$url = SECUREURL . "index.php?page=account.shipto&user_info_id=" . $db->f('user_info_id')."&next_page=checkout.index";
	echo '<a href="'.$sess->url($url).'">'.$VM_LANG->_('PHPSHOP_UDATE_ADDRESS').'</a>'."\n";
	echo '</label>';
	$html.=ob_get_contents();
	ob_end_clean();
}
?>
		</td>
		<td>
			<? echo $html; ?>
		</td>
	</tr>
</table>

<style type="text/css">
	#vmAddressTable td {vertical-align:top}
	.label_address {display:none}
	.label_address_active {display:block}
</style>
<script type="text/javascript" language="javascript">
	function ToggleAddresses(el) {
		var labels = $$(".label_address_active");
		for (var i=0; i<labels.length;i++) {
			labels[i].className="label_address";
		}
		$("label_"+el.value).className="label_address_active";
	}
</script>
