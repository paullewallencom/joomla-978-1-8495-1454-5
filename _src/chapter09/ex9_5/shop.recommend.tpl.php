<?php
if( !defined( '_VALID_MOS' ) && !defined( '_JEXEC' ) ) die( 'Direct Access to '.basename(__FILE__).' is not allowed.' );
?>    
	<style type="text/css">
		#RecommendToFriend {margin:5px}
		#RecommendToFriend th {text-align:left}
	</style>
	<div id="RecommendToFriend">
	This is a customized Recommend To Friend form. You can write instructions here, add graphic images etc.
    <form action="index2.php" method="post">
     <table border="0" cellspacing="2" cellpadding="1" width="80%">
      <tr>
        <th><?php echo $VM_LANG->_('EMAIL_FRIEND_ADDR') ?></th>
        <td><input type="text" name="recipient_mail" size="50" value="<?php echo $recipient_mail ?>" /></td>
      </tr>
      <tr>
        <th><?php echo $VM_LANG->_('EMAIL_YOUR_NAME') ?></th>
        <td><input type="text" name="sender_name" size="50" value="<?php echo $sender_name ?>" /></td>
      </tr>
      <tr>
        <th><?php echo $VM_LANG->_('EMAIL_YOUR_MAIL') ?></th>
        <td><input type="text" name="sender_mail" size="50" value="<?php echo $sender_mail ?>" /></td>
      </tr>
      <tr>
        <th colspan="2"><?php echo $VM_LANG->_('VM_RECOMMEND_FORM_MESSAGE') ?></th>
      </tr>
      <tr>
        <td colspan="2">
          <textarea name="recommend_message" style="width: 100%;height: 200px;padding:5px"><?php echo $message; ?></textarea>
        </td>
      </tr>
    </table>
    
    <input type="hidden" name="option" value="com_virtuemart" />
    <input type="hidden" name="page" value="shop.recommend" />
    <input type="hidden" name="product_id" value="'.$product_id.'" />
    <input type="hidden" name="<?php echo $vmHash ?>" value="1" />
    <input type="hidden" name="Itemid" value="'.$sess->getShopItemid().'" />
    <input type="hidden" name="func" value="recommendProduct" />
    <input class="button" type="submit" name="submit" value="<?php echo $VM_LANG->_('PHPSHOP_SUBMIT') ?>" />
    <input class="button" type="button" onclick="window.close();" value="<?php echo $VM_LANG->_('CMN_CANCEL') ?>" />
    </form>
	</div>
