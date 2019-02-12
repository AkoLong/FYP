<!--?php
if(isset($error))
{
echo "<pre>";
var_dump($record);
echo "</pre>";
die();
}
?-->

<script>
$(function(){
	var state = "<?=$record?$record['restaurant_state']:null?>";
	var record = "<?=$record?1:null?>";
	var status	= "<?=$record?$record['restaurant_status']:null?>";
	var busDay	= "<?=$record?$record['restaurant_business_day']:null?>";
	var cod 	= "<?=$record?$record['restaurant_cod']:null?>";
	var isNew 	= "<?=$isNew?1:null?>";
	if(isNew =='1')
	{
		$('.notNew').hide().removeAttr('required');
		$('#option31').prop('checked',true);
		$('#option32').prop('checked',false);
	}
	else
	{
		$('#option31').prop('checked',false);
		$('#option32').prop('checked',true);
		$('.img').attr('disabled','').removeAttr('required').hide();
	}
	if(cod=="1")
	{
		$('#option11').prop('checked',true).parent().addClass('active');
		$('#option12').prop('checked',false).parent().removeClass('active');
	}
	if(record=="1")
	{
		$('.onlyCreate').hide().removeAttr("required");
		if(status=="registered" ||status=="pending")
			$('.deliInfo').show().attr("required","");
		else
		{
			$('.deliInfo').hide().removeAttr("required");
		}
		if(busDay=="")
		{
			$('.noInfo').show().prop("checked",true);
			$('.buisDay').removeAttr("checked");
			$('.inputClass').attr("disabled","").removeAttr("required");
			$('#Hours').hide();
		}
		else
		{
			$('.buisDay').removeAttr("checked");
			$('.inputClass').attr("disabled","").removeAttr("required");
			$('.noInfo').hide().prop("checked",false);
			var foo = "<?=$record['restaurant_business_day_1'][0];?>";
			if(foo!="")
			{
				$('#'+foo).prop("checked",true);
				$('.'+foo).removeAttr("disabled").attr("required","");
			}
			foo = "<?=$record['restaurant_business_day_1'][1];?>";
			if(foo!="")
			{
				$('#'+foo).prop("checked",true);
				$('.'+foo).removeAttr("disabled").attr("required","");
			}
			foo = "<?=$record['restaurant_business_day_1'][2];?>";
			if(foo!="")
			{
				$('#'+foo).prop("checked",true);
				$('.'+foo).removeAttr("disabled").attr("required","");
			}
			foo = "<?=$record['restaurant_business_day_1'][3];?>";
			if(foo!="")
			{
				$('#'+foo).prop("checked",true);
				$('.'+foo).removeAttr("disabled").attr("required","");
			}
			foo = "<?=$record['restaurant_business_day_1'][4];?>";
			if(foo!="")
			{
				$('#'+foo).prop("checked",true);
				$('.'+foo).removeAttr("disabled").attr("required","");
			}
			foo = "<?=$record['restaurant_business_day_1'][5];?>";
			if(foo!="")
			{
				$('#'+foo).prop("checked",true);
				$('.'+foo).removeAttr("disabled").attr("required","");
			}
			foo = "<?=$record['restaurant_business_day_1'][6];?>";
			if(foo!="")
			{
				$('#'+foo).prop("checked",true);
				$('.'+foo).removeAttr("disabled").attr("required","");
			}
		}
	}
	else
	{
		$('.deliInfo').hide().removeAttr("required");
	}
	if(state!="")
		$('#selState').find('#'+state).attr("selected","selected");
	var identity = "<?=$identity?>";
	$("#alertcod").hide();
	$(".ownerid").hide().removeAttr("required");
	$(".note").hide();
	$(".withnote").focusin(function(){
		$(this).next(".note").show();
	});
	$(".withnote").focusout(function(){
		$(this).next(".note").hide();
	});
	if(identity == "owner")
		$('.adminOnly').hide().removeAttr("required");
	$('.buisDay').on('change',function(){
		var val = $(this).val();
		if(this.checked)
			$('.'+val).removeAttr("disabled").attr("required","");
		else
			$('.'+val).attr("disabled","").removeAttr("required").val(null);
	});
	$('.nobuisDay').on('change',function(){
		if(this.checked)
		{
			$('.buisDay').attr("disabled","").removeAttr("checked");
			$('.inputClass').attr("disabled","");
			$('#Hours').hide();
		}
		else
		{
			$('.buisDay').removeAttr("disabled");
			$('#Hours').show();
		}
	});
	$("#option02").on("change",function(){
		if($("#option02").is(':checked'))
		{
			$(".ownerid").show().attr("required","");
			$(".deliInfo").show().attr("required","");
		}
	});
	$("#option01").on("change",function(){
		if($("#option01").is(':checked'))
		{
			$(".ownerid").hide().removeAttr("required");
			$(".deliInfo").hide().removeAttr("required");
		}
	});
	$("#option12").on("change",function(){
		if($("#option12").is(':checked'))
		{
			$('#alertcod').hide();
		}
	});
	$("#option11").on("change",function(){
		if($("#option11").is(':checked'))
		{
			$('#alertcod').show();
		}
	});
	$("#option32").on("change",function(){
		if($("#option32").is(':checked'))
		{
			$('.img').attr('disabled','').removeAttr('required').hide();
		}
	});
	$("#option31").on("change",function(){
		if($("#option31").is(':checked'))
		{
			$('.img').attr('required','').removeAttr('disabled').show();
		}
	});
});
</script>
<style>
</style>
<div class="register">
<div class="container">
<h2><?=!$isNew?'Restaurant Information Update':'Register New Restaurant'?></h2>
<div class="login-form-grids">
<label style="color:red;font-size:20px;"><?=isset($error)?$error:null;?></label>
<?=isset($error)?"<br /><hr /><br />":null?>
<form action="p_restaurantform" method="post" enctype="multipart/form-data">
<h5>Restaurant Information</h5><br />
	<input type="hidden" name="hidID" value="<?=$record?$record['restaurant_id']:null?>" />
	<input type="hidden" name="hidSta" value="<?=$record?$record['restaurant_status']:null?>" />
	<input type='hidden' name='hidImg' value="<?=isset($record['restaurant_image_path'])?$record['restaurant_image_path']:null?>"/>
	<label>Name :</label><br />
	<input type="text" name ="txtName" value="<?=$record?$record['restaurant_name']:null?>" required=""/><br />
	<label>Contact Number :</label><br />
	<input type="text" name ="txtCont" value="<?=$record?$record['restaurant_contact']:null?>" required=""/><br />
	<label>Address : </label><br />
	<textarea name="txtAddress" placeholder="Address..." class="form-control" required="" rows="4"><?=$record?$record['restaurant_address']:null?></textarea><br />
	<label>State : </label><br />
	<select name="selState" class="form-control" id="selState">
		<option id="Sabah" value="Sabah">Sabah</option>
		<option id="Sarawak" value="Sarawak">Sarawak</option>
		<option id="Johor" value="Johor">Johor</option>
		<option id="Selangor" value="Selangor">Selangor</option>
		<option id="Penang" value="Penang">Penang</option>
		<option id="Terengganu" value="Terengganu">Terengganu</option>
		<option id="Kelantan" value="Kelantan">Kelantan</option>
		<option id="Kedah" value="Kedah">Kedah</option>
		<option id="Melacca" value="Melacca">Melacca</option>
		<option id="Perak" value="Perak">Perak</option>
		<option id="Pahang" value="Pahang">Pahang</option>
		<option id="Perlis" value="Perlis">Perlis</option>
		<option id="Negeri Sembilan" value="Negeri Sembilan">Negeri Sembilan</option>
	</select><br />
	<label>Zip Code : </label><br />
	<input type="text" maxlength="5" name="txtZip" placeholder="Zip Code..." class="form-control" required="" value="<?=$record?$record['restaurant_zip']:null?>"/><br />
	<label>Title : <br /></label>
	<input type="text" maxlength="50" name ="txtTitle" placeholder="Restaurant Title" class ="form-control withnote" required="" value="<?=$record?$record['restaurant_title']:null?>" />
	<label class="note">Write something that best desribe your restaurant, cannot exceed 50 alphabets(spaces, numbers and symbols are considered as alphabets as well). This part can be omitted by placing a dash.</label><br /><br />
	<label>Description : <br /></label>
	<textarea name="txtDesc" placeholder="Address..." class="form-control withnote" required="" rows="4" maxlength="500"><?=$record?$record['restaurant_description']:null?></textarea>
	<label class="note">Write a paragraph to desribe your restaurant or put notification for your restaurant, cannot exceed 500 alphabets(spaces, numbers and symbols are considered as alphabets as well). This part can be omitted by placing a dash.</label><br /><br />
	<label>Business Day : <br/></label>
	<div class="register-check-box">
	<div class="check" id="ccheck">
		<label class="checkbox normal"><input type="checkbox" name="chkDay0" class="buisDay" value="Monday" id="Monday" checked/><i></i>Monday</label><br />
		<label class="checkbox normal"><input type="checkbox" name="chkDay1" class="buisDay" value="Tuesday" id="Tuesday"checked/><i></i>Tuesday</label><br />
		<label class="checkbox normal"><input type="checkbox" name="chkDay2" class="buisDay" value="Wednesday" id="Wednesday"checked/><i></i>Wednesday</label><br />
		<label class="checkbox normal"><input type="checkbox" name="chkDay3" class="buisDay" value="Thursday" id="Thursday"checked/><i></i>Thursday</label><br />
		<label class="checkbox normal"><input type="checkbox" name="chkDay4" class="buisDay" value="Friday" id="Friday"checked/><i></i>Friday</label><br />
		<label class="checkbox normal"><input type="checkbox" name="chkDay5" class="buisDay" value="Saturday" id="Saturday"checked/><i></i>Saturday</label><br />
		<label class="checkbox normal"><input type="checkbox" name="chkDay6" class="buisDay" value="Sunday" id="Sunday"checked/><i></i>Sunday</label><br />
		<label class="checkbox adminOnly onlyCreate noInfo" ><input type="checkbox" class="nobuisDay onlyCreate noInfo" name="chkDay7" value="Not enough Information" id="Not enough Information"/><i></i>Not enough Information</label><br />
	</div>
	</div>
	<br />
	<div id="Hours">
	<label>Business Hour : <br/><br/></label>
	<table id="busiHour" width="100%">
	<thead>
		<tr><th>Business Day</th><th>Opening Time</th><th>Closing Time</th></tr>
	</thead>
	<tbody>
		<?php
		$days	= ['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'];
		for($i=0;$i<7;$i++)
		{
			$z=$days[$i];
			echo "<tr>";
			echo "<td>{$z}</td><td><input class='inputClass {$z}' type='time' name='start{$i}' required value='";
			echo $record?$record['restaurant_business_hour'][$z][0]:null;
			echo "'/></td><td><input class='inputClass {$z}' type='time' name='end{$i}'required value='";
			echo $record?$record['restaurant_business_hour'][$z][1]:null;
			echo "'/></td>";
			echo "</tr>";
		}
		?>
	</tbody>
	</table>
	</div>
	<br />
	<div class="adminOnly onlyCreate">
	<label>Register As :</label><br />
		<div class="btn-group" data-toggle="buttons">
			<label class="btn btn-primary active">
			<input name="radResType" value="Unregistered" type="radio" id="option01" autocomplete="off" checked> Dummy Restaurant
			</label>
			<label class="btn btn-primary ">
			<input name="radResType" value="Registered" type="radio" id="option02" autocomplete="off"> Owner's Restaurant
			</label>
		</div>
		<br />
		<div class="ownerid">
		<label>Owner ID :</label>
		<input type="text" name="txtOwner" class="ownerid form-control onlyCreate" required="" placeholder="Owner ID"/>
		</div>
	</div>
	<div class="deliInfo">
		<h6>Delivery Information</h6>
		<hr />
		<label>Delivery Fee :</label><br />
		<input type="number" name="txtDeliFee" class="form-control deliInfo" step="0.01" placeholder="Delivery Fee" required="" value="<?=$record?$record['restaurant_deliver_fee']:null?>"/><br />
		<label>Delivery Coverage :</label><br />
		<input type="text" name="txtDeliCov" class="form-control deliInfo" placeholder="Delivery Coverage" required="" value="<?=$record?$record['restaurant_deliver_coverage']:null?>"/><br />
		<label>Delivery Minimum Order :</label><br />
		<input type="number" name="txtDeliMin" class="form-control deliInfo" step="0.01" placeholder="Delivery Minimum Order"required="" value="<?=$record?$record['restaurant_deliver_minimum_order']:null?>"/><br />
		<label>Estimated Delivery Time :</label>
		<input type="number" style="width:75px" name="txtDeliHours" class="deliInfo" placeholder="Hours" required="" max="23" min="0" value="<?=$record?$record['restaurant_deliver_time']['hours']:null?>"/>
		<input type="number" style="width:75px" name="txtDeliMins" class="deliInfo" placeholder="Minutes"required="" max="59"min="0" value="<?=$record?$record['restaurant_deliver_time']['minutes']:null?>"/>
		<label>Cash On Delivery :</label>
		<div class="btn-group" data-toggle="buttons">
			<label class="btn btn-primary ">
			<input name="radCOD" value="Yes" type="radio" id="option11" autocomplete="off" > Yes
			</label>
			<label class="btn btn-primary active">
			<input name="radCOD" value="No" type="radio" id="option12" autocomplete="off" checked> No
			</label>
		</div>
		<label id='alertcod'>If you agree with the cash on delivery features, the risk is at your own respondsibility. Please do read the terms and conditions before agree with the cash on delivery features.</label><br />
	</div>
	<div class='notNew'>
		<label class='notNew'>Change Image?</label>
		<div class="btn-group notNew" data-toggle="buttons">
			<label class="btn btn-primary">
			<input name="radImg" value="Yes" type="radio" id="option31" autocomplete="off"> Yes
			</label>
			<label class="btn btn-primary active">
			<input name="radImg" value="No" type="radio" id="option32" autocomplete="off" checked> No
			</label>
		</div>
	</div><br />
		<div class='img'>
		<label>Image :</label><br />
		<input type='file' name='fileImage' size='20' class='form-control img'/><br />
		</div>
	<input type="submit" value="<?=!$isNew?'Update Information':'Add New Restaurant'?>" />
</form>
</div>
</div>
</div>
</div>