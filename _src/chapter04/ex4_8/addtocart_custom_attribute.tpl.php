<?php if( !defined( '_VALID_MOS' ) && !defined( '_JEXEC' ) ) die( 'Direct Access to '.basename(__FILE__).' is not allowed.' ); 

?>
<script language="JavaScript" type="text/javascript">//<![CDATA[
	var maxLength=10;
	var maxExceededMessage="Maximum length exceeded";
	var script1="if (checkForm(this)==false) return false;";
	var script2="handleAddToCart( this.id );return false;";
	var scriptAdded=false;
	function checkForm(frm) {
		for (var i=0; i<frm.elements.length; i++) {
			var el=frm.elements[i];
			if (el.tagName=="TEXTAREA" && el.value.length > maxLength) {
						alert(maxExceededMessage);
						return false;
			}
		}
		return true;
	}
	function addScript(el) {
		if (scriptAdded) return;
		var frm=el.form;
		frm.onsubmit=new Function("event",script1+script2);
		scriptAdded=true;
	}
	//]]>
	</script>
<?php
foreach($attributes as $attribute) { 		
    foreach( $attribute as $attr => $val ) {
        // Using this we make all the variables available in the template
        // translated example: $this->set( 'product_name', $product_name );
        $this->set( $attr, $val );
    }
    ?>
    <div style="float: left;width:60px;text-align:right;margin:3px;">
        <label for="<?php echo $attribute['titlevar'] ?>_field"><?php echo $attribute['title'] ?>
        </label>:
    </div>
    <div class="vmAttribChildDetail" style="float:left;width:60%;margin:3px;">
        <textarea class="inputboxattrib" id="<?php echo $attribute['titlevar'] ?>_field" rows="5" cols=30" 
				name="<?php echo $attribute['titlevar'].$attribute['product_id'] ?>">
		</textarea>
    </div>	
    <br style="clear: both;" />
    <input type="hidden" name="custom_attribute_fields[]" value="<?php echo $attribute['titlevar'].$attribute['product_id'] ?>" />
    <input type="hidden" name="custom_attribute_fields_check[<?php echo $attribute['titlevar'].$attribute['product_id'] ?>]" value="<?php echo md5($mosConfig_secret. $attribute['titlevar'].$attribute['product_id'] ) ?>" />
<?php } ?>
