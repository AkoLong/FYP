<script>
$(function(){
	$(".note").hide();
	$(".withnote").focusin(function(){
		$(this).next(".note").show();
	});
	$(".withnote").focusout(function(){
		$(this).next(".note").hide();
	});
});

</script>
<div class="register">
	<div class="login-form-grids">
		<h2>Admin Registration</h2>
		<label style="color:red;font-size:20px;"><?=isset($error)?$error:null;?></label><?=isset($error)?"<br /><hr /><br />":null?>
		<form action="p_register03" class="regform">
		<h5 style="font-size:20px;">profile information</h5>
		<hr />
			<label>Name : </label><br />
			<input name="txtFstName" type="text" placeholder="First Name..." required=" " value="<?=isset($error)?$retainval['FstName']:null;?>"><br />
			<input name="txtLstName" type="text" placeholder="Last Name..." required=" " value="<?=isset($error)?$retainval['LstName']:null;?>"><br />
		<h6 style="font-size:20px;">Login information</h6>
		<hr />
			<input name="txtEmail" type="email" placeholder="Email Address" required=" " value="<?=isset($error)?$retainval['Email']:null;?>">
			<input name="txtPass" type="password" placeholder="Password" required=" " pattern=".{8,15}" maxlength="15" class="withnote"><label class="note">The length of the password must be between 8 and 15 characters.</label>
			<input name="txtCPass" type="password" placeholder="Password Confirmation" required=" " pattern=".{8,15}" maxlength="15">
			<input type="submit" value="Register">
		</form>
	</div>
</div>