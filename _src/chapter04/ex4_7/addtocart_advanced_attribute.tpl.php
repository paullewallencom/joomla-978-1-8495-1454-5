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
		foreach ( $attribute['options_list'] as options_item ) : ?>
        <input type="radio" id="<?php echo $attribute['titlevar']. $i ?>_field" name="<?php echo $attribute['titlevar'].$attribute['product_id'] ?>" value="<?php echo $options_item['base_var'] ?>">
	        <?php if( isset( $options_item['display_price']) ) : ?>
	        <?php echo $options_item['base_value'] ?> (<?php echo $options_item['sign'].$options_item['display_price'] ?>)
	        <?php else : ?>
	       <?php echo $options_item['base_value'] ?>
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
