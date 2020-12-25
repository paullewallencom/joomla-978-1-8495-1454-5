<?php if( !defined( '_VALID_MOS' ) && !defined( '_JEXEC' ) ) die( 'Direct Access to '.basename(__FILE__).' is not allowed.' ); 

foreach($attributes as $attribute) { 		
    ?>
    <div class="vmAttribChildDetail" style="float: left;text-align:right;margin:3px;">
        <label for="<?php echo $attribute['titlevar'] ?>_field"><?php echo $attribute['title'] ?></label>:
    </div>
    <div class="vmAttribChildDetail" style="float:left;margin:3px;">
        <select class="inputboxattrib" id="<?php echo $attribute['titlevar'] ?>_field" name="<?php echo $attribute['titlevar'].$attribute['product_id'] ?>">
<?php
		$i=0;
		$relative_path='attribute/'.strtolower($attribute['titlevar']);
		$attribute_image_path = IMAGEPATH.$relative_path;
		if (file_exists($attribute_image_path) && is_dir($attribute_image_path)) {
			$has_image=true;
			$attribute_image_url = IMAGEURL.$relative_path;
		}
		foreach ( $attribute['options_list'] as options_item ) : ?>
 		<?php
			$onclick='';
			if ($has_image) {
				$option_value=strtolower($options_item['base_var']);
				$onclick='onclick="if (window.VM_ChangeImage) VM_ChangeImage(\''.$option_value.'\')"';
			}
		?>
      		<input type="radio" id="<?php echo $attribute['titlevar']. $i ?>_field" 
				name="<?php echo $attribute['titlevar'].$attribute['product_id'] ?>" 
				value="<?php echo $options_item['base_var'] ?>"
				<?php echo $onclick ?> />
			<label for="<?php echo $attribute['titlevar']. $i ?>_field">
	        <?php if( isset( $options_item['display_price']) ) : ?>
	        <?php echo $options_item['base_value'] ?> (<?php echo $options_item['sign'].$options_item['display_price'] ?>)
	        <?php else : ?>
	       <?php echo $options_item['base_value'] ?>
			<?
				if ($has_image) {
					echo '<br />
						<img class="attribute_image" src="'.$attribute_image_url.$option_value.'.jpg" />
						<br />
					';
				}
			?>
			</label>
	        <?php endif; ?>
        <?php $i++;
		endforeach; ?>	
    </div>
    <br style="clear:both;" />
    
<?php 
} ?>
<style type="text/css">
	.vmCartChild {float:none}
</style>
