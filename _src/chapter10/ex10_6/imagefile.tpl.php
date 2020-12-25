<?php
// most of the codes are adapted from the the original VirtueUpload codes.
// you need to have VirtueUpload component installed to have the code working

defined( '_JEXEC' ) or die( 'Restricted access' );

$upload_attr='Image_Id_field';
$upload_desc_attr='Image_File_Name_field';
ob_start();
?>
<?php
// code adapted from modules/mod_virtueupload/mod_virtueupload.php
if(!file_exists(JPATH_SITE.DS."components".DS."com_virtueupload".DS."virtueupload.php")) {
	return '';
}
require_once (JPATH_ADMINISTRATOR.DS.'components'.DS.'com_virtueupload'.DS.'classes'.DS.'output.class.php');
$config 		= VUOutput::config();
$user 			=& JFactory::getUser();
$document		=& JFactory::getDocument();
$jscript		= '';
$msg			= JRequest::getVar('msg', '');
$upload_id		= JRequest::getInt('upload_id', 0);
$uploadinfo 	= false;
if ($upload_id) {
	$uploadinfo = VUOutput::UploadInfoId($upload_id, 'module'); //original code to get html for display in frontend
}

$form->status  	= VUOutput::getStatus($msg);
$form->ip 		= $_SERVER['REMOTE_ADDR'];
$form->session_id 	= session_id();
$form->uri_url	= VUOutput::_getUriString();
$form->prod_id	= JRequest::getInt('product_id', 0);
$form->cat_id	= JRequest::getInt('category_id', 0);
// code adapted from modules/mod_virtueupload/mod_virtueupload.php ends
?>
<?php
// code adapted from modules/mod_virtueupload/tmpl/default.php ends
global $Itemid;
JHTML::stylesheet('virtueupl_front.css','components/com_virtueupload/assets/css/');
$document->addScript(JURI::base()."administrator/components/com_virtueupload/assets/js/checkform.js");
?>
<div id="virtueupl_form">
<form id="adminForm" name="adminForm"  action="<?php echo JRoute::_('index.php?option=com_virtueupload&view=form'); ?>" method="post" enctype="multipart/form-data" onSubmit="return checkForm();">
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr> 
    <td colspan="2">
		<label for="file"><?php echo JText::_('VULANG_FORM_LBL_FILE'); ?></label><br/>
		<input name="file" type="file" class="button" />
	</td>
    <td valign="bottom">
		<input id="upload_button" class="button" type="submit" value="<?php echo JText::_('VULANG_FORM_SUBMIT'); ?>" onclick="this.form.status.value = '<?php echo JText::_('VULANG_STAT_INITUPL'); ?> '; $('spinner').style.display = 'block';	this.form.status.style.color = '#339900';" />
	</td>
  </tr>
  <tr>
    <td height="50" align="left" valign="middle">
<label for="status"><?php echo JText::_('VULANG_FORM_STATUS'); ?></label>
	</td>
	<td colspan="2">
		<input class="vu_status" size="50" type="text" id="status" name="status" readonly="readonly" value="<?php echo JText::_('VULANG_STAT_WAITTUPL'); ?>" />
		<img id="spinner" style="display:none; border:none; position: relative; top: 3px;" src="components/com_virtueupload/assets/ajax-loader.gif" alt="Loading..."/>
	</td>
 </tr>
<?php 
 if ($uploadinfo) {
?>
  <tr>
    <td colspan="3">
		<?php echo $uploadinfo; ?>
	</td>
 </tr>

<?php 
}
?> 
 </table>
<?php echo $jscript; ?>

<?php echo JHTML::_( 'form.token' ); ?>
<input type="hidden" name="task" value="submit" />
<input type="hidden" name="prod_id" value="<?php echo $form->prod_id; ?>" />
<input type="hidden" name="cat_id" value="<?php echo $form->cat_id; ?>" />
<input type="hidden" name="uri_url" value="<?php echo $form->uri_url; ?>" />
<input type="hidden" name="Itemid" value="<?php echo $Itemid; ?>" />
<input type="hidden" name="userid" value="<?php echo $user->id; ?>" />
<input type="hidden" name="session_id" value="<?php echo $form->session_id; ?>" />
<input type="hidden" name="controller" value="entry" />
</form>
<?php
//keep session alive while editing
JHTML::_('behavior.keepalive');
//javascript statusinput
echo $form->status;
$inputsize = 2;
$none = 'none';
if ($upload_id) {
	$uploadfile = VUOutput::UploadInfoId($upload_id); 
}
$upload_desc = $uploadfile->file_name;
?>
<script type='text/javascript'>
	var upload_id=<?php echo $upload_id ?>;
	var upload_desc="<?php echo $upload_desc ?>";
	window.addEvent('domready',function(){
		var uploadattr =  $("<?php echo $upload_attr ?>");
		var uploaddescattr =  $("<?php echo $upload_desc_attr ?>");
		if (uploadattr) {
			uploadattr.readOnly = true;
			uploadattr.className = 'readonly';
			uploadattr.size = <?php echo $inputsize ?>;
			if (uploadattr.value == '') {
				uploadattr.value = "<?php echo $none ?>";
			}
			if (upload_id) {
				uploadattr.value = upload_id;
			}
		}
		if (uploaddescattr) {
			uploaddescattr.readOnly = true;
			uploaddescattr.className = 'readonly';
			if (upload_id) {
				uploaddescattr.value = upload_desc;
			}
		}
	});	
</script>
</div>
<style type="text/css">
	#virtueupl_form {border:1px solid silver;margin:10px;padding:10px;margin-left:0}
</style>
<?php
// code adapted from modules/mod_virtueupload/tmpl/default.php ends

$virtue_upload_html = ob_get_contents();
ob_end_clean();
return $virtue_upload_html;
?>
