<!-- login -->
<script>
$(function(){
	var acc		= "<?=isset($error)?$retainval['Account']:null?>";
	if(acc=="owner")
	{
		$('#owner').addClass('active');
		$('#customer').removeClass('active');
		$('#owner').attr("checked","");
		$('#customer').removeAttr("checked");
	}
});
</script>
<?php
/*if(isset($error))
{
	echo "<pre>";
	var_dump($retainval);
	die();
}*/
?>
	<div class="login">
		<div class="container">
			<h2>Login Form</h2>
			<div class="login-form-grids animated wow slideInUp" data-wow-delay=".5s">
			<label style="color:red;font-size:20px;"><?=isset($error)?$error:null;?></label>
			<?=isset($error)?"<br /><hr /><br />":null?>
				<form action="p_login">
					<input type="email" placeholder="Email Address" required=" " value="<?=isset($error)?$retainval['Email']:null?>" name="txtEmail">
					<input type="password" placeholder="Password" required=" " name="txtPass" ><br />
					<label>Account Type	: </label><br />
					<div class="btn-group" data-toggle="buttons">
						<label class="btn btn-primary active" id="customer">
						<input name="radAccount" value="customer" type="radio" name="options" id="option01" autocomplete="off" checked> Customer
						</label>
						<label class="btn btn-primary " id="owner">
						<input name="radAccount" value="owner" type="radio" name="options" id="option02" autocomplete="off"> Owner
						</label>
					</div>
					<div class="forgot">
						<a href="forgetPassword">Forgot Password?</a>
					</div>
					<input type="submit" value="Login">
				</form>
			</div>
			<h4>For New People</h4>
			<p><a href="regform01">Register Here</a> (Or) go back to <a href="index">Home<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></a></p>
		</div>
	</div>
<!-- //login -->