<?php
if( !defined( '_VALID_MOS' ) && !defined( '_JEXEC' ) ) die( 'Direct Access to '.basename(__FILE__).' is not allowed.' );

class ps_communication extends vm_ps_communication {

  function showRecommendForm( $product_id ) {
    global $VM_LANG, $vendor_store_name, $sess,$my;
    
    $sender_name = shopMakeHtmlSafe(vmGet( $_REQUEST, 'sender_name', null));
    $sender_mail = shopMakeHtmlSafe(vmGet( $_REQUEST, 'sender_mail', null));
    $recipient_mail = shopMakeHtmlSafe(vmGet( $_REQUEST, 'recipient_mail', null));
    $message = shopMakeHtmlSafe( vmGet( $_REQUEST, 'recommend_message'));
    if (!empty($message)) {
			$message = stripslashes(str_replace( array('\r', '\n' ), array("\r", "\n" ), $message ));
    } else {
			$message = sprintf($VM_LANG->_('VM_RECOMMEND_MESSAGE',false), 
				$vendor_store_name, 
				$sess->url( URL.'index.php?page=shop.product_details&product_id='.$product_id,
				true ));
			$message = shopMakeHtmlSafe(stripslashes( str_replace( 'index2.php', 'index.php', $message )));
    }
		$template = vmTemplate::getInstance();
		$template->set_vars( array(
			'sender_name'=>(!empty($sender_name)?$sender_name:$my->name),
			'sender_mail'=>(!empty($sender_mail)?$sender_mail:$my->email),
			'recipient_mail'=>(!empty($recipient_mail)?$recipient_mail:''),
			'message'=>$message,
			'vmHash'=>vmCreateHash(),
			'Itemid'=>$sess->getShopItemid(),
			'product_id'=>$product_id
		));
		echo $template->fetch('pages/shop.recommend.tpl.php');
  }
}
?>
