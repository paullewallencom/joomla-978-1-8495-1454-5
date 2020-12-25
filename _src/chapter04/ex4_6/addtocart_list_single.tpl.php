<?php if( !defined( '_VALID_MOS' ) && !defined( '_JEXEC' ) ) die( 'Direct Access to '.basename(__FILE__).' is not allowed.' ); ?>

<?php
mm_showMyFileName(__FILE__);

// Start Ouputing the Child Detail
?>
<div class="vmCartDetails<?php echo $cls_suffix ?>">
    <!-- Output The heading -->
		<table>
    <?php if($display_header == "Y") { ?>
        <tr class="vmCartChildHeading<?php echo $cls_suffix ?>">
            <td style="float: left;width: <?php echo $desc_width ?>;"><?php echo $VM_LANG->_('PHPSHOP_PRODUCT_DESC_TITLE') ?></td >
            <?php //Ouput Each Attribute Heading
            foreach($headings as $key => $value) { ?>
                <td style="width: <?php echo $attrib_width ?>;" ><?php echo $headings[$key] ?></td>
            <?php } ?>
            <td style="width: 15%;"><?php echo $VM_LANG->_('PHPSHOP_CART_QUANTITY') ?></td>
            <td style="width: 12%;"><?php echo $VM_LANG->_('PHPSHOP_PRODUCT_INVENTORY_PRICE') ?></td>
        if ($display_product_type == "Y" && $product['product_type'] != "") { ?>    
			<td> &nbsp; </td>
		<?php } ?>
      <?php if(USE_AS_CATALOGUE != '1' && ($product['advanced_attribute'] != "" || $product['custom_attribute'] != "")) { ?>
			<td> &nbsp; </td>
		<?php } ?>
        </tr>
    <?php }
// Loop through each row and build the table
foreach( $products as $product ) { 		
    foreach( $product as $attr => $val ) {
        // Using this we make all the variables available in the template
        // translated example: $this->set( 'product_name', $product_name );
        $this->set( $attr, $val );
    }
    ?>
    <tr class="<?php echo $product['bgcolor'].$cls_suffix ?>">
        <td class="vmCartChildElement<?php echo $cls_suffix ?>">
            <input type="hidden" name="prod_id[]" value="<?php echo $product['product_id'] ?>" />
            <input type="hidden" name="product_id" value="<?php echo $product['parent_id'] ?>" />
            <?php if( $child_link ) : ?>
            <label for="selItem<?php echo $product['product_id'] ?>">
            <?php endif; ?>
            <span class="vmChildDetail<?php echo $cls_suffix ?>" style="width :<?php echo $desc_width ?>" />
                <?php echo $product['product_title'] ?></span>
			 <?php if( $child_link ) : ?>
			</label>
			<?php endif; ?>
		</td>
            <?php // Ouput Each Attribute
			if( !empty( $product['attrib_value'] )) {
				foreach($product['attrib_value'] as $attribute) { ?>
					<td class="vmChildDetail<?php echo $cls_suffix ?>" style="width :<?php echo $attrib_width ?>;">
					<?php echo " ".$attribute ?></td>
				<?php 
				}
			}
			?>
			<?php 
            // Output Quantity Box 
            if (USE_AS_CATALOGUE != '1' ) { ?>
                <td style="padding-right:5px;"><?php echo product['quantity_box'] ?></td>
            <?php } 
            // Output Price 
            if( $_SESSION['auth']['show_prices'] && _SHOW_PRICES) { 
                ?>
                <td class="vmChildDetail<?php echo $cls_suffix ?>" style="text-align: right;padding-right:5px;" >
                <?php
                if( $product['price'] != $product['actual_price'] ) { ?>
                    <span class="product-Old-Price"><?php echo $product['price'] ?>&nbsp;</span>
                <?php 
				}
				?> 
                <span class="productPrice"><?php echo $product['actual_price'] ?></span>
				</td> <!-- close the vmChildDetail -->
            <?php } ?>
       <?php
        // Out Put Product Type 
        if ($display_product_type == "Y" && $product['product_type'] != "") { ?>    
            <td class="vmChildType<?php echo $cls_suffix ?>">
            <?php echo $product['product_type'] ?>
            </td>
        <?php } 
        // Output Advanced & Custom Attributes
        if(USE_AS_CATALOGUE != '1' && ($product['advanced_attribute'] != "" || $product['custom_attribute'] != "")) { ?>
            <td class="vmCartAttributes<?php echo $cls_suffix ?>">
                <?php if($product['advanced_attribute']) {
                    echo $product['advanced_attribute'];                }
                if($product['custom_attribute']) {
                    echo $product['custom_attribute'];
                }
            ?>
            </td>
        <?php } ?>
    </tr>
<?php } ?>
</table>	
<!-- Future Use -->
<input type="hidden" name="set_price[]" value="" />
<input type="hidden" name="adjust_price[]" value="" />
<input type="hidden" name="master_product[]" value="" />
</div >

