<script>
$(function(){
	var isNew		= "<?=$isNew?1:null?>";
	var identity 	= "<?=$identity;?>";
	var gender		= "<?=$record?$record['customer_gender']:null?>";
	var state 		= "<?=$record?$record['customer_state']:null?>";
	$("[name='txtStatusRe']").hide();
	if(identity =='customer')
	{
		$(".adminOnly").hide().removeAttr("required");
	}
	$("[name='selStatus']").on("change",function(){
		$("[name='txtStatusRe']").show().attr("required","");
	});
	if(gender == "Female")
	{
		$('#male').removeClass("active");
		$('#option01').removeAttr("checked");
		$('#female').addClass("active");
		$('#option02').attr("checked","");
	}
	if(state!="")
	{
		$('#selState').find('#'+state).attr("selected","selected");
	}
});
</script>
<div class='register'>
<div class='container'>
<h2><?=$isNew?'Add New Customer':'Update Information';?></h2>
<div class='login-form-grids'>
<form action='p_customerForm' method='post'>
<input type='hidden' name='hidID' value="<?=isset($record['customer_id'])?$record['customer_id']:null?>"/>
<label>Name :</label><br/>
<input type='text' name='txtName' value="<?=$record?$record['customer_name']:null?>"/><br />
<label>Gender :</label><br/>
<div class="btn-group" data-toggle="buttons">
	<label class="btn btn-primary active" id="male">
		<input name="radGender" value="Male" type="radio" id="option01" autocomplete="off" checked> Male
	</label>
	<label class="btn btn-primary " id="female">
		<input name="radGender" value="Female" type="radio" id="option02" autocomplete="off"> Female
	</label>
</div><br /><br />
<label>Birthday :</label><br/>
<input type='date' name='txtBirth' value="<?=$record?$record['customer_birth']:null?>" /><br /><br />
<label>Contact :</label><br/>
<input type='text' name='txtCont' value="<?=$record?$record['customer_contact']:null?>"/><br /><br />
<label>Address :</label><br/>
<textarea name="txtAddress" placeholder="Address..." class="form-control" required="" rows="4"><?=$record?$record['customer_address']:null?></textarea><br /><br />
<label>State</label><br/>
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
</select><br /><br />
<label>Zip Code</label><br/>
<input type="text" maxlength="5" name="txtZip" placeholder="Zip Code..." class="form-control" required="" value="<?=$record?$record['customer_zip']:null?>"/><br />
<div class="register-check-box">
	<div class="check">
		<label id="chkSub" class="checkbox checked" ><input type="checkbox" name="chkSub" checked><i> </i>Subscribe to Newsletter</label>
	</div>
</div>
<div class='adminOnly'>
	<label>Customer Email : </label><br/>
	<input name="txtEmail" type="email" placeholder="Email Address" required=" " value="<?=$record?$record['customer_email']:null;?>" class='form-control adminOnly'><br />
	<label>Customer Status :</label><br/>
	<select name="selStatus" class="form-control adminOnly">
		<option id="Active" value="Active">Active</option>
		<option id="Suspened" value="Suspened">Suspened</option>
	</select><br /><br />
	<label name='txtStatusRe'>Customer Status Remark :</label><br/>
	<input type='text' name='txtStatusRe' class='form-control' id='Remark'/>
</div>
<input type='submit' value='Submit' class='form-control'/>
</form>
</div>
</div>
</div>