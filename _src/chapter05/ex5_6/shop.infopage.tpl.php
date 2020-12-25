<?php
if( !defined( '_VALID_MOS' ) && !defined( '_JEXEC' ) ) die( 'Direct Access to '.basename(__FILE__).' is not allowed.' );
/**
*
* @version $Id: shop.infopage.tpl.php 1471 2008-07-14 18:35:42Z soeren_nb $
* @package VirtueMart
* @subpackage themes
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
mm_showMyFileName( __FILE__ );
require_once( CLASSPATH . 'ps_vendor.php');
?>
<h3><?php echo $v_name;?></h3>
  <div class="vm_infopage_image">
    <a href="<?php $db->p("vendor_url") ?>" target="blank">
      <img border="0" src="<?php echo IMAGEURL ?>vendor/<?php echo $v_logo; ?>">
    </a>
  </div>
 	<div class="vm_infopage_content">
         <div class="sectiontableheader">
          <strong><?php echo $VM_LANG->_('PHPSHOP_STORE_FORM_CONTACT_LBL') ?></strong>
        </div>
 	<div class="vm_infopage_address">
        <?php echo ps_vendor::formatted_store_address( true ); ?>
       </div>
       <div class="vm_infopage_other">
          <br /><?php echo $VM_LANG->_('PHPSHOP_STORE_FORM_CONTACT_LBL') ?>:&nbsp;<?php echo $v_title ." " . $v_first_name . " " . $v_last_name ?>
          <br /><?php echo $VM_LANG->_('PHPSHOP_STORE_FORM_PHONE') ?>:&nbsp;<?php $db->p("contact_phone_1");?>
          <br /><?php echo $VM_LANG->_('PHPSHOP_STORE_FORM_FAX') ?>:&nbsp;<?php echo $v_fax ?>
          <br /><?php echo $VM_LANG->_('PHPSHOP_STORE_FORM_EMAIL') ?>:&nbsp;<?php echo $v_email; ?><br />
          <br /><a href="<?php $db->p("vendor_url") ?>" target="_blank"><?php $db->p("vendor_url") ?></a><br />
      </div>
      <div class="vm_infopage_desc">
          <?php $db->p("vendor_store_desc") ?>
      </div>
 	</div>
