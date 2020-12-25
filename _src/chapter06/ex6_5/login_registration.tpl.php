<?php
if( !defined( '_VALID_MOS' ) && !defined( '_JEXEC' ) ) die( 'Direct Access to '.basename(__FILE__).' is not allowed.' ); 
/**
*
* @version $Id: login_registration.tpl.php 1345 2008-04-03 20:26:21Z soeren_nb $
* @package VirtueMart
* @subpackage templates
* @copyright Copyright (C) 2008 soeren - All rights reserved.
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
* VirtueMart is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See /administrator/components/com_virtuemart/COPYRIGHT.php for copyright notices and details.
*
* http://virtuemart.net
*/

   // If we have a POST value for "func", we were oviously directed here, because a validation error
   // occured during registration. So, let's show the Registration Details Stretcher first
   // Otherwise the Login Form will be shown by default
   $open_to_stretcher = !isset($_POST['func']) ? '0' : '1';
   $show_login = VM_REGISTRATION_TYPE == 'NO_REGISTRATION' ? 0 : 1;
?>
<?php if( $show_login ) : ?>
<h4><input type="radio" name="togglerchecker" id="toggler1" class="toggler" <?php if($open_to_stretcher == 0 ) { ?>checked="checked"<?php } ?> />
<label for="toggler1"><?php echo $VM_LANG->_('PHPSHOP_RETURN_LOGIN') ?></label>
</h4>
<div class="stretcher" id="login_stretcher">
<?php include( PAGEPATH . 'checkout.login_form.php' ); ?>
</div>
<br />
<h4><input type="radio" name="togglerchecker" id="toggler2" class="toggler" <?php if($open_to_stretcher == 1 ) { ?>checked="checked"<?php } ?> />
<label for="toggler2"><?php echo $VM_LANG->_('PHPSHOP_NEW_CUSTOMER') ?></label></h4>
<div class="stretcher" id="register_stretcher">
<?php endif; ?>

<?php 
ob_start();
include(PAGEPATH. 'checkout_register_form.php'); 
$html = ob_get_contents();
ob_end_clean();
$html = str_replace('name="vm_private" id="vm_private_field"',
	'name="vm_private" id="vm_private_field" onclick="ToggleCompany(this)"',$html);
$html = str_replace('<br style="clear:both;" /><div id="company_div"',
	'<br id="company_br" style="clear:both;" /><div id="company_div"',$html);
echo $html;
?>

<?php if( $show_login ) : ?>
   </div>
   <br />
   
<?php
   echo vmCommonHTML::scriptTag('', 'Window.onDomReady(function() {
	
	// get accordion elements
	myStretch = $$( \'.toggler\' );
	myStretcher = $$( \'.stretcher\' );
	
	// Create the accordion
	myAccordion = new Fx.Accordion(myStretch, myStretcher, 
		{
			/*fixedHeight: 125,*/
			opacity : true,
			display: '.$open_to_stretcher.'
		});

});');
?>
<?php endif; ?>
<style type="text/css">
	#company_div label {padding-left:10px}
</style>
<script type="text/javascript" language="javascript">
function ToggleCompany(el) {
	if (el.checked) {
		$("company_div").style.display="none";
		$("company_input").style.display="none";
		$("company_br").style.display="none";
	} else {
		$("company_div").style.display="block";
		$("company_input").style.display="block";
		$("company_br").style.display="block";
	}
}
</script>
