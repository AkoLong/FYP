<div class="register">
<div class="container">
<div class="login-form-grids">
<label style="color:red;font-size:20px;"><?=$error?$error:null;?></label>
<?=$error?"<br /><hr /><br />":null?>
<h2>Enter the following detail to change your password.</h2>
<form action='p_forgetPassword'>
<label>Account Type : </label><br />
	<div class="btn-group" data-toggle="buttons">
	<label class="btn btn-primary active">
	<input name="radAcc" value="customer" type="radio" id="option11" autocomplete="off" checked> Customer
</label>
<label class="btn btn-primary ">
	<input name="radAcc" value="owner" type="radio" id="option12" autocomplete="off"> Owner
	</label>
</div>
<br /><br />
<input type='email' name='txtEmail' placeholder='Email' class='form-control' value='<?=$error?$retainval['email']:null?>'/><br />
<input type='password' name='txtSecure' placeholder='Secure Code' maxlength='6' class='form-control' /><br />
<input type='submit' value='Submit' />
</form>
</div>
</div>
</div>