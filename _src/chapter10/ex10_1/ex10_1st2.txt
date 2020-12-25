<?php
if( !defined( '_VALID_MOS' ) && !defined( '_JEXEC' ) ) die( 'Direct Access to '.basename(__FILE__).' is not allowed.' );

class ps_checkout extends vm_ps_checkout {

	function email_receipt($order_id) {
		$result = parent::email_receipt($order_id);
		$template = vmTemplate::getInstance();
		if ($template->get_cfg('pauseAfterEmail',0)) {
			die( 'testing confirmation_email template. An email has been sent out');
		} else {
			return $result;
		}
	}
}
?>
