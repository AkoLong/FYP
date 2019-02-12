<!-- login -->
	<div class="login">
		<div class="container">
			<h2>Admin Login</h2>
			<div class="login-form-grids animated wow slideInUp" data-wow-delay=".5s">
			<label style="color:red;font-size:20px;"><?=isset($error)?$error:null;?></label>
			<?=isset($error)?"<br /><hr /><br />":null?>
				<form action="p_login2">
					<input type="email" placeholder="Email Address" required=" " value="<?=isset($error)?$retainval['Email']:null?>" name="txtEmail">
					<input type="password" placeholder="Password" required=" " name="txtPass" ><br />
					<div class="forgot">
						<a href="#">Forgot Password?</a>
					</div>
					<input type="submit" value="Login">
				</form>
			</div>
			<h4>For New People</h4>
			<p><a href="registered">Register Here</a> (Or) go back to <a href="index">Home<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></a></p>
		</div>
	</div>
<!-- //login -->