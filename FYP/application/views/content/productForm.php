<script>
$(function(){
	$(".note").hide();
	$(".withnote").focusin(function(){
		$(this).next(".note").show();
	});
	$(".withnote").focusout(function(){
		$(this).next(".note").hide();
	});
	
	var isNew 	= "<?=$isNew?1:null?>";
	if(isNew =='1')//New Product
	{
		//alert("new");
		$('#newType').prop('selected',true);
		$('#txtNew').removeAttr('disabled').attr('required','').attr('name','selType').show();
		$('#prodType').removeAttr('name');
		$('.notNew').hide().removeAttr('required');
		$('#option01').prop('checked',true);
		$('#option02').prop('checked',false);
	}
	else
	{
		//alert("old");
		var prodType	= '<?=$record['product_type_1']?>';
		$('#txtNew').hide();
		$('#prodType').find('#'+prodType).prop('selected',true);
		$('#option01').prop('checked',false);
		$('#option02').prop('checked',true);
		$('.img').attr('disabled','').removeAttr('required').hide();
	}
	$('#prodType').on("change",function(){
		if($('#newType').is(':selected'))
		{
			$('#txtNew').removeAttr('disabled').attr('required','').attr('name','selType').show();;
			$('#prodType').removeAttr('name');
		}
		else
		{
			$('#txtNew').removeAttr('required').attr('disabled','').removeAttr('name').hide();
			$('#prodType').attr('name','selType');
		}
	});
	var identity 	= "<?=$identity?>";
	if(identity == 'owner')
	{
		$('.adminOnly').hide().removeAttr('required');
		
	}
	$("#option02").on("change",function(){
		if($("#option02").is(':checked'))
		{
			$('.img').attr('disabled','').removeAttr('required').hide();
		}
	});
	$("#option01").on("change",function(){
		if($("#option01").is(':checked'))
		{
			$('.img').attr('required','').removeAttr('disabled').show();
		}
	});
});
</script>
<div class='register'>
<div class='container'>
<h2><?=$isNew?'Add New Product':'Update Product Information';?></h2>
<div class='login-form-grids'>
<label style="color:red;font-size:20px;"><?=isset($error)?$error:null;?></label>
<?=isset($error)?"<br /><hr /><br />":null?>
<form action='p_productForm' method='post' enctype="multipart/form-data">
	<input type='hidden' name='hidID' value="<?=$record?$record['product_id']:null?>"/>
	<input type='hidden' name='hidImg' value="<?=isset($record['product_image_path'])?$record['product_image_path']:null?>"/>
	<label>Product Name :</label><br />
	<input name='txtName' type='text' placeholder='Product Name' required='' value="<?=$record?$record['product_name']:null?>" class='form-control'/><br />
	<label>Product Type :</label><br />
	<select name='selType' class='form-control' id='prodType'>
		<?php
		foreach($productType as $num 	=> $product)
		{
			$idd		= $productType2[$num];
			echo "<option id='{$idd}' value='{$product}'>{$product}</option>";
		}
		?>
		<option id='newType' value='New Type'>New Type</option>
	</select><br />
	<input type='text' class='form-control' placeholder='New Product Type' id='txtNew' disabled /><br />
	<label>Product Price :</label><br />
	<input type='number' step='0.01' min='0' max='999.99' class='form-control withnote' placeholder='Product Price' name='txtPrice' value="<?=$record?$record['product_price']:null?>"/><label class='note'>The unit price for every products cannot exceed RM 999.99</label><br />
	<label>Product Discounted Price :</label><br />
	<input type='number' step='0.01' min='0' max='999.99' class='form-control withnote' placeholder='Product Discounted Price' name='txtDisPrice' value="<?=$record?$record['product_discounted_price']:null?>" required=''/>
	<label class='note'>Please place the same value of the original product price if the product is currently not in promotion.</label><br />
	<label>Product Description :</label><br />
	<textarea class='form-control' placeholder='Product Description' name='txtDesc' required='' maxlength='500' rows='4'><?=$record?$record['product_description']:null;?></textarea><br />
	<div class='notNew'>
		<label class='notNew'>Change Image?</label>
		<div class="btn-group notNew" data-toggle="buttons">
			<label class="btn btn-primary">
			<input name="radImg" value="Yes" type="radio" id="option01" autocomplete="off"> Yes
			</label>
			<label class="btn btn-primary active">
			<input name="radImg" value="No" type="radio" id="option02" autocomplete="off" checked> No
			</label>
		</div>
	</div>
		<div class='img'>
		<label>Image :</label><br />
		<input type='file' name='fileImage' size='20' class='form-control img'/><br />
		</div>
	<div class='adminOnly'>
	<label>Restaurant ID:</label><br />
	<input type='text' name='txtResId' class='adminOnly' required='' value="<?=isset($product_restaurant_id)?$product_restaurant_id:null?>"/>
	</div>
	<input type='submit' value="<?=!$isNew?'Update Information':'Add New Product'?>" />
</form>
</div>
</div>
</div>