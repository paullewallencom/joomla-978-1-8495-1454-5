<?php if( !defined( '_VALID_MOS' ) && !defined( '_JEXEC' ) ) die( 'Direct Access to '.basename(__FILE__).' is not allowed.' ); 
mm_showMyFileName(__FILE__);?>

<div><?php echo $VM_LANG->_(‘VM_MANUFACTURER_HEADER’) ?></div> 
<?php 
$manufacturer_id=$_REQUEST['manufacturer_id'];
$manufacturer_link=URL.'index.php?option=com_virtuemart&page=shop.manufacturer_page&manufacturer_id='.$manufacturer_id;
$manufacturer_banner=IMAGEURL.'manufacturer_banner_'.$manufacturer_id.'.png';
?>
<h3><a href="<?php echo $manufacturer_link ?>"><?php echo $browsepage_lbl ?></a></h3>
<div><img src="<?php echo $manufacturer_banner ?>" /></div>
<div class="browseDesc"><?php echo $browsepage_lbltext ?></div>