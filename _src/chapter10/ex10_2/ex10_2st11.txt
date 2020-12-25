<?php
if( !defined( '_VALID_MOS' ) && !defined( '_JEXEC' ) ) die( 'Direct Access to '.basename(__FILE__).' is not allowed.' ); 
?>
<?php
// EMAIL FOOTER MESSAGE 
if( $is_email_to_shopper ) {
	$footer_html = "<br /><br />".$VM_LANG->_('PHPSHOP_CHECKOUT_EMAIL_SHOPPER_HEADER2')."<br />";
	
	if( VM_REGISTRATION_TYPE != 'NO_REGISTRATION' ) {
		$footer_html .= "<br /><a title=\"".$VM_LANG->_('PHPSHOP_CHECKOUT_EMAIL_SHOPPER_HEADER5')."\" href=\"$order_link\">"
		. $VM_LANG->_('PHPSHOP_CHECKOUT_EMAIL_SHOPPER_HEADER5')."</a>";
	}
	$footer_html .= "<br /><br />".$VM_LANG->_('PHPSHOP_CHECKOUT_EMAIL_SHOPPER_HEADER3')."<br />";
	$footer_html .= $VM_LANG->_('CMN_EMAIL').": <a href=\"mailto:" . $from_email."\">".$from_email."</a>";
	// New in version 1.0.5
	if( @VM_ONCHECKOUT_SHOW_LEGALINFO == '1' && !empty( $legal_info_title )) {
		$footer_html .= "<br /><br />____________________________________________<br />";
		$footer_html .= '<h5>'.$legal_info_title.'</h5>';
		$footer_html .= $legal_info_html.'<br />';
	}
} else {
	$footer_html = '<br /><br /><a title="'.$VM_LANG->_('PHPSHOP_CHECKOUT_EMAIL_SHOPPER_HEADER5').'" href="'.$order_link.'">'
		. $VM_LANG->_('PHPSHOP_CHECKOUT_EMAIL_SHOPPER_HEADER5').'</a>';
}
echo $footer_html;
?>
