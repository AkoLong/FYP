<script>
$(function(){
	var gender	= "<?=$record?$record['owner_gender']:null?>";
	var state = "<?=$record?$record['owner_state']:null?>";
	var sub = "<?=$record?$record['owner_sub']:null?>";
	var stat = "<?=$record?$record['owner_status']:null?>";
	var identity = "<?=$identity?>";
	$("[name='txtStatusRe']").hide();
	$(".backbtntoview").hide();
	$(".ownerdiv").hide();
	if(identity =="owner")
	{
		$(".adminOnly").hide();
		$(".ownerdiv").show();
		$(".formdiv").hide();
		$("#h2title").text("Owner Profile");
	}
	else
	{
		if(stat!="")
			$("[name='selStatus']").find("#"+stat).attr("selected","selected");
		$(".ownerOnly").hide();
	}
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
	if(sub=="0")
	{
		$("[name='chkSub']").removeAttr("checked");
		$('#chkSub').removeClass('checked');
	}
	$("[name='selStatus']").on("change",function(){
		$("[name='txtStatusRe']").show().attr("required","");
	});
});
function editprofile()
{
	$(".ownerdiv").hide();
	$(".formdiv").show();
	$(".backbtntoview").show();
	$("#h2title").text("Owner Information Update");
}
function backtoviewdiv()
{
	$(".formdiv").hide();
	$(".backbtntoview").hide();
	$(".ownerdiv").show();
	$("#h2title").text("Owner Profile");
}
</script>
<style>
</style>
<div class="register">
<div class="container">
<h2 id="h2title"><?=!$isNew?'Owner Information Update':'Register New Owner'?></h2>
<div class="login-form-grids">
<label style="color:red;font-size:20px;"><?=isset($error)?$error:null;?></label>
<div class="formdiv"> <!-- Form Div -->
<form action="p_ownerform" method="post">
<h5>Profile Information</h5><br />
	<input type="hidden" name="hidID" value="<?=$record?$record['owner_id']:null?>" />
	<label>Name :</label><br />
	<input type="text" name ="txtName" value="<?=$record?$record['owner_name']:null?>" required=""/><br />
	<label>Gender :</label><br />
	<div class="btn-group" data-toggle="buttons">
		<label class="btn btn-primary active" id="male">
			<input name="radGender" value="Male" type="radio" id="option01" autocomplete="off" checked> Male
		</label>
		<label class="btn btn-primary " id="female">
			<input name="radGender" value="Female" type="radio" id="option02" autocomplete="off"> Female
		</label>
	</div><br />
	<label>Date of birth :</label><br />
	<input type="date" name ="txtBirth" value="<?=$record?$record['owner_birth']:null?>" required=""/><br />
	<label>Contact Number :</label><br />
	<input type="text" name ="txtCont" value="<?=$record?$record['owner_contact']:null?>" required=""/><br />
	<label>Address : </label><br />
	<textarea name="txtAddress" placeholder="Address..." class="form-control" required="" rows="4"><?=$record?$record['owner_address']:null?></textarea><br />
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
	<input type="text" maxlength="5" name="txtZip" placeholder="Zip Code..." class="form-control" required="" value="<?=$record?$record['owner_zip']:null?>"/><br />
	<div class="register-check-box">
		<div class="check">
			<label id="chkSub" class="checkbox checked" ><input type="checkbox" name="chkSub" checked><i> </i>Subscribe to Newsletter</label>
		</div>
	</div>
	<div class="adminOnly">
	<label>Email :</label><br />
	<input name="txtEmail" type="email" placeholder="Email Address" required=" " value="<?=$record?$record['owner_email']:null;?>">
	<label>Owner Status :</label>
	<select name="selStatus" class="form-control">
		<option id="pending" value="pending">Pending</option>
		<option id="verified" value="verified">Verified</option>
		<option id="timeout" value="timeout">Timeout</option>
		<option id="approved" value="approved">Approved</option>
		<option id="disapproved" value="disapproved">Disapproved</option>
	</select>
	</div><br />
	<input type="text" placeholder="Status Remark" name="txtStatusRe" /><br />
	<input type="submit" value="<?=$record?'Update Information':'Add New Owner'?>" />
</form>
	<input type="submit" value="Back" onclick=backtoviewdiv() class="backbtntoview">
</div> <!-- // Form Div -->
<style>
.viewtable
{
	font-size:1.1em;
	border-spacing:10px;
	border-collapse: separate;
}
</style>
<div class="ownerdiv"> <!-- Owner view Div -->
	<h3 style="text-align:center;font-size:1.8em;">Profile Information</h3><br /><br><hr>
	<table class="viewtable">
		<tr>
			<td width="200px"><label>Name </label></td>
			<td><span><?=$record?$record['owner_name']:null?></span><br /></td>
		</tr>
		<tr>
			<td><label>Gender </label></td>
			<td><span><?=$record?$record['owner_gender']:null?></span></td>
		</tr>
		<tr>
			<td><label>Date of birth </label></td>
			<td><span><?=$record?$record['owner_birth']:null?></span></td>
		</tr>
		<tr>
			<td><label>Contact Number </label></td>
			<td><span><?=$record?$record['owner_contact']:null?></span></td>
		</tr>
		<tr>
			<td><label>Address  </label></td>
			<td><span><?=$record?$record['owner_address']:null?></span></td>
		</tr>
		<tr>
			<td><label>State  </label></td>
			<td><span><?=$record?$record['owner_state']:null?></span></td>
		</tr>
		<tr>
			<td><label>Zip Code  </label></td>
			<td><span><?=$record?$record['owner_zip']:null?></span></td>
		</tr>
	</table>
	<hr>
	<input type="submit" value="<?=!$isNew?'Edit Profile':'Add New Owner'?>" onclick=editprofile() />
</div> <!-- //Owner view Div -->
</div>
</div>
</div>