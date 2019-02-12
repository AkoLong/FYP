<!-- register -->
	<div class="register">
		<!--AKO ADDED tab selection (customer or restaurant owner) -->
	 	<div id="regtab">
			<div class="clearfix">
			  	<a class="regtablink" id="regtab1" onclick="opencustomer()">Customer</a>
				<a class="regtablink" id="regtab2" onclick="openowner()">Restaurant Owner</a>
			</div>
		</div>
		<!-- Js -->
		<script>
			$(document).ready(function(){
				var error02 	= "<?=isset($error02)?$error02:null?>";
				if(error02=="")
				{
					$("#regtab1").click();
				}
				else
				{
					$("#regtab2").click();
				}
				$(".note").hide();
				$(".withnote").focusin(function(){
					$(this).next(".note").show();
				});
				$(".withnote").focusout(function(){
					$(this).next(".note").hide();
				});
				var gender		= "<?=isset($error)?$retainval['Gender']:null?>";
				var state		= "<?=isset($error)?$retainval['State']:null?>";
				var gender02	= "<?=isset($error02)?$retainval['Gender02']:null?>";
				var state02		= "<?=isset($error02)?$retainval['State02']:null?>";
				var resState02	= "<?=isset($error02)?$retainval['ResState02']:null;?>";
				if(gender == "Female")
				{
					$('#male1').removeClass("active");
					$('#option01').removeAttr("checked");
					$('#female1').addClass("active");
					$('#option02').attr("checked","");
				}
				if(state!="")
				{
					$('#selState').find('#'+state).attr("selected","selected");
				}
				if(state02!="")
				{
					$('#selState02').find('#'+state02).attr("selected","selected");
					$('#selResState02').find('#'+resState02).attr("selected","selected");
				}
				if(gender02 == "Female")
				{
					$('#male2').removeClass("active");
					$('#option11').removeAttr("checked");
					$('#female2').addClass("active");
					$('#option12').attr("checked","");
				}
			});
			function opencustomer()
			{
				$("#container1").show();
				$("#container2").hide();
				$("#regtab1").removeClass("targetted");
				$("#regtab2").removeClass("targetted");
				$("#regtab1").addClass("targetted");
			}
			function openowner()
			{
				$("#container2").show();
				$("#container1").hide();
				$("#regtab1").removeClass("targetted");
				$("#regtab2").removeClass("targetted");
				$("#regtab2").addClass("targetted");
			}
		</script>
		<!-- /Js -->
		<!-- CSS -->
		<style>
		#regtab
			{
				width:100%;
			}
		#regtab div
			{
				width:70%;
				margin:auto;
				border:1px solid #e1e1e1;
				margin-bottom:50px;
			}
		.regtablink
			{
				width:50%;
				float:left;
				text-align: center;
				color:#016773;
				text-transform: uppercase;
				font-size:20px;
				font-weight:600;
				padding: 10px 53px;
				text-decoration: none;				
			}
		.regtablink:hover
			{
				background:#fe9126;
				color:white;
				text-decoration: none;
			}
		.regtablink:focus
			{
				background:#fe9126;
				color:white;
				text-decoration: none;
			}
		.targetted
			{
				background:#fe9126;
				color:white;
				text-decoration: none;
			}
		</style>
		<!-- /CSS -->
		<!-- Tab button media query-->
		<style type="text/css">
		@media (max-width: 955px){
			.regtablink
			{
				padding:10px 0;
			}
		}
		@media (max-width:800px){
			.regtablink
			{
				padding:15px 0;
				width:100%;
			}
		}
		@media (max-width: 335px){
			.regtablink
			{
				width:100%;
				margin:0;
				padding:0px 0px;
			}
			#regtab1
			{
				padding:15px 0;
			}
		}
		</style>
		<!-- /Tab media query -->
		<!-- CONTAINER 1 FOR CUSTOMER REGISTRATION-->
		<div class="container" id="container1">
			<h2>Register As a Customer</h2>
			<div class="login-form-grids">
			<label style="color:red;font-size:20px;"><?=isset($error)?$error:null;?></label>
			<?=isset($error)?"<br /><hr /><br />":null?>
				<h5 style="font-size:20px;">profile information</h5>
				<br />
				<form action="p_register01" method="post" id="form01 cform" class="regform">
					<label>Name : </label><br />
					<input name="txtFstName" type="text" placeholder="First Name..." required=" " value="<?=isset($error)?$retainval['FstName']:null;?>" /><br />
					<input name="txtLstName" type="text" placeholder="Last Name..." required=" " value="<?=isset($error)?$retainval['LstName']:null;?>"><br />
					<label>Gender : </label><br />
					<div class="btn-group" data-toggle="buttons">
						<label class="btn btn-primary active">
						<input name="radGender" value="Male" type="radio" id="option01" autocomplete="off" checked> Male
						</label>
						<label class="btn btn-primary ">
						<input name="radGender" value="Female" type="radio" id="option02" autocomplete="off"> Female
						</label>
					</div>
					<br /><br />
					<label>Date of birth :</label><br />
					<input name="txtBirth" type="date" required=" " value="<?=isset($error)?$retainval['Birth']:null;?>"/>
					<br /><br />
					<label>Contact Number :</label><br />
					<input name="txtCont" type="text" placeholder="Contact Number..." required=" " value="<?=isset($error)?$retainval['Cont']:null;?>"><br />
					<label>Address : </label><br />
					<textarea name="txtAddress" placeholder="Address..." class="form-control withnote" required rows="4"><?=isset($error)?$retainval['Address']:null?></textarea>
					<label class="note">This address will be used as your default delivery address. It can be changed later on your profile page.</label>
					<br /><br />
					<label>State :</label><br />
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
					<label>Zip Code :</label><br />
					<input type="text" maxlength="5" name="txtZip" placeholder="Zip Code..." class="form-control" required="" value="<?=isset($error)?$retainval['Zip']:null?>"/>
					<div class="register-check-box">
						<div class="check">
							<label class="checkbox checked" ><input type="checkbox" name="chkSub" checked><i> </i>Subscribe to Newsletter</label>
						</div>
					</div>
				<h6 style="font-size:20px;">Login information</h6>
				<hr />
					<input name="txtEmail" type="email" placeholder="Email Address" required=" " value="<?=isset($error)?$retainval['Email']:null;?>">
					<input name="txtPass" type="password" placeholder="Password" required=" " pattern=".{8,15}" maxlength="15" class="withnote" id="cpassword"><label class="note">The length of the password must be between 8 and 15 characters.</label>
					<input name="txtCPass" type="password" placeholder="Password Confirmation" required=" " pattern=".{8,15}" maxlength="15" id="cpconfirm"><span id="cpconfirmtext"></span>
					<input name="txtSecure" type="password"  pattern=".{6}" title="Enter a 6 character secure code" maxlength="6" placeholder="Secure Code" required="" class="withnote" id="csecure">
					<label class="note">This 6 characters code is asked for every payment you made in our system.</label>
					<input name="txtCSecure" type="password"  pattern=".{6}" maxlength="6" title="Confirm your secure code" placeholder="Secure Code Confirmation" required="" id="csconfirm"><span id="csconfirmtext"><br></span>
					<div class="register-check-box">
						<div class="check" id="ccheck">
							<label class="checkbox"><input type="checkbox" id="ccheckbox"><i> </i>I accept the <a href="#">terms and conditions</a></label>
						</div>
					</div>
					<input type="submit" value="Register" id="csubmit">
				</form>
			</div>
			<div class="register-home">
				<a href="index">Home</a><br /><br />
			</div>
		</div>
		<!-- CONTAINER 1 FINNISH -->
		<!-- CONTAINER 2 FOR RESTAURANT OWNER REGISTRATION-->
		<div class="container" id="container2">
			<h2>Register As an Owner</h2>
			<div class="login-form-grids">
				<label style="color:red;font-size:20px;"><?=isset($error02)?$error02:null;?></label>
				<?=isset($error02)?"<br /><hr /><br />":null?>
				<h5 style="font-size:20px;">profile information</h5>
				</ hr></br>
				<form action="p_register02" method="post" id="form01 rform" class="regform">
					<label>Name : </label><br />
					<input name="txtFstName02" type="text" placeholder="First Name..." required=" " value="<?=isset($error02)?$retainval['FstName02']:null;?>"><br />
					<input name="txtLstName02" type="text" placeholder="Last Name..." required=" " value="<?=isset($error02)?$retainval['LstName02']:null;?>"><br />
					<label>Gender : </label><br />
					<div class="btn-group" data-toggle="buttons">
						<label class="btn btn-primary active">
						<input name="radGender02" value="Male" type="radio" id="option11" autocomplete="off" checked> Male
						</label>
						<label class="btn btn-primary ">
						<input name="radGender02" value="Female" type="radio" id="option12" autocomplete="off"> Female
						</label>
					</div>
					<br /><br />
					<label>Date of birth :</label><br />
					<input name="txtBirth02" type="date" required=" " value="<?=isset($error02)?$retainval['Birth02']:null;?>"/>
					<br /><br />
					<label>Contact Number :</label><br />
					<input name="txtCont02" type="text" placeholder="Contact Number..." required=" " value="<?=isset($error02)?$retainval['Cont02']:null;?>"><br />
					<label>Address : </label><br />
					<textarea name="txtAddress02" placeholder="Address..." class="form-control" required rows="4" ><?=isset($error02)?$retainval['Address02']:null?></textarea>
					<br /><br />
					<label>State :</label><br />
					<select name="selState02" class="form-control" id="selState02">
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
					<label>Zip Code :</label><br />
					<input type="text" maxlength="5" name="txtZip02" placeholder="Zip Code..." class="form-control" required="" value="<?=isset($error02)?$retainval['Zip02']:null?>"/>
				<div class="register-check-box" id="subs02">
					<div class="check">
						<label class="checkbox" ><input type="checkbox" name="chkSub02" checked><i> </i>Subscribe to Newsletter</label>
					</div>
				</div>
				<h6 style="font-size:20px;">Restaurant information</h6>
				<hr />
				<label>Restaurant Name :</label><br />
				<input name="txtResName02" type="text" placeholder="Restaurant Name" required="" value="<?=isset($error02)?$retainval['ResName02']:null?>" /><br />
				<label>Restaurant Contact :</label><br />
				<input name="txtResCont02" type="text" placeholder="Restaurant Contact Number" required="" value="<?=isset($error02)?$retainval['ResCont02']:null?>" /><br />
				<label>Restaurant Address :</label><br />
				<textarea name="txtResAddress02" class="form-control" placeholder="Restaurant Address" required rows="4"><?=isset($error02)?$retainval['ResAddress02']:null;?></textarea>
				<br /><br />
				<label>Restaurant State :</label><br />
				<select name="selResState02" class="form-control">
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
				<label>Restaurant Zip Code :</label><br />
				<input type="text" maxlength="5" name="txtResZip02" placeholder="Zip Code..." class="form-control" required="" value="<?=isset($error02)?$retainval['ResZip02']:null?>"/>
				<h6 style="font-size:20px;">Login information</h6>
				<hr />
					<input name="txtEmail02" type="email" placeholder="Email Address" required=" " value="<?=isset($error02)?$retainval['Email02']:null;?>" class="withnote"><label class="note">An email with specific validation links will be sent to this address once the restaurant has been verified.</label>
					<input name="txtPass02" type="password" placeholder="Password " required=" " pattern=".{8,15}" maxlength="15" class="withnote" id="rpassword"><label class="note">The length of the password must be between 8 and 15 characters.</label>
					<input name="txtCPass02" type="password" placeholder="Password Confirmation" required=" " pattern=".{8,15}" maxlength="15" id="rpconfirm"><span id="rpconfirmtext"></span>
					<input name="txtSecure02" type="password"  pattern=".{6}" title="Enter a 6 character secure code" maxlength="6" placeholder="Secure Code" required="" class="withnote" id="rsecure"><label class="note">This 6 character secure code is asked for process that required higher authority.</label>
					<input name="txtCSecure02" type="password"  pattern=".{6}" maxlength="6" title="Confirm your secure code" placeholder="Secure Code Confirmation" required="" id="rsconfirm"><span id="rsconfirmtext"><br></span>
					<div class="register-check-box">
						<div class="check" id="rcheck">
							<label class="checkbox" >
							<input type="checkbox" id="rcheckbox">
							<i> </i>I accept the <a href="#">terms and conditions</a></label>
						</div>
					</div>
					<input type="submit" value="Register" id="rsubmit" >
					<style>
						/* Submit button become half opacity when disabled */
						#rsubmit:disabled{opacity:0.5;}
						#csubmit:disabled{opacity:0.5;}
					</style>
					<script src="<?=base_url();?>js/jquery_for_regform01.js"></script>
					<script>
					//Customer Password and Secure Code Confirmation JS
						//To check if submit button condition is achieved
						function cchecksubmit()
						{
							if(($('#cpassword').val()==$('#cpconfirm').val()&&$('#cpconfirm').val()!="")
							   &&($('#csecure').val()==$('#csconfirm').val()&&$('#csconfirm').val()!="")
							   &&($("#ccheckbox").is(":checked"))
							   ){
									$('#csubmit').removeAttr('disabled');
							}
							else{$('#csubmit').attr('disabled', 'disabled');}
						}

						$(document).ready(function(){
							
							$('#csubmit').attr('disabled', 'disabled');
							$('#ccheck').change(function(){
								cchecksubmit();
							});
					//Password Confirmation for Customer
							$('#cpconfirmtext').hide();
							$('#cpconfirm').focusin(function(){
								$('#cpconfirmtext').show();
							});
							$('#cpconfirm').focusout(function(){
								if($('#cpconfirmtext').val==""){
									$('#cpconfirmtext').hide();
								}
							});
							$('#cpconfirm,#cpassword').on('keyup',function(){
								if($('#cpassword').val()==$('#cpconfirm').val()){
									$('#cpconfirmtext').text("Confirmed password matches.").css('color','green');
									cchecksubmit();
								}
								else{
									$('#cpconfirmtext').text("Confirmed password does not match.").css('color','red');
									cchecksubmit();
								}
								if($('#cpconfirm').val()==""){
									$('#cpconfirmtext').text("");
								}
							});
					//Secure Code Confirmation for Customer
							$('#csconfirm,#csecure').on('keyup',function(){
								if($('#csecure').val()==$('#csconfirm').val()){
									$('#csconfirmtext').text("Confirmed secure code matches.").css('color','green');
									cchecksubmit();
								}
								else{
									$('#csconfirmtext').text("Confirmed secure code does not match.").css('color','red');
									cchecksubmit();
								}
								if($('#csconfirm').val()==""){
									$('#csconfirmtext').html("<br/>");
								}
							});
							
							
						});
					// ENDED Customer Password and Secure Code Confirmation JS
					//Restaurant Owner Password and Secure Code Confirmation JS
						//To check if submit button condition is achieved
						function rchecksubmit()
						{
							if(($('#rpassword').val()==$('#rpconfirm').val()&&$('#rpconfirm').val()!="")
							   &&($('#rsecure').val()==$('#rsconfirm').val()&&$('#rsconfirm').val()!="")
							   &&($("#rcheckbox").is(":checked"))
							   ){
									$('#rsubmit').removeAttr('disabled');
							}
							else{$('#rsubmit').attr('disabled', 'disabled');}
						}

						$(document).ready(function(){
							
							$('#rsubmit').attr('disabled', 'disabled');
							$('#rcheck').change(function(){
								rchecksubmit();
							});
					//Password Confirmation for Restaurant Owner
							$('#rpconfirmtext').hide();
							$('#rpconfirm').focusin(function(){
								$('#rpconfirmtext').show();
							});
							$('#rpconfirm').focusout(function(){
								if($('#rpconfirmtext').val==""){
									$('#rpconfirmtext').hide();
								}
							});
							$('#rpconfirm,#rpassword').on('keyup',function(){
								if($('#rpassword').val()==$('#rpconfirm').val()){
									$('#rpconfirmtext').text("Confirmed password matches.").css('color','green');
									rchecksubmit();
								}
								else{
									$('#rpconfirmtext').text("Confirmed password does not match.").css('color','red');
									rchecksubmit();
								}
								if($('#rpconfirm').val()==""){
									$('#rpconfirmtext').text("");
								}
							});
					//Secure Code Confirmation for Restaurant Owner
							$('#rsconfirm,#rsecure').on('keyup',function(){
								if($('#rsecure').val()==$('#rsconfirm').val()){
									$('#rsconfirmtext').text("Confirmed secure code matches.").css('color','green');
									rchecksubmit();
								}
								else{
									$('#rsconfirmtext').text("Confirmed secure code does not match.").css('color','red');
									rchecksubmit();
								}
								if($('#rsconfirm').val()==""){
									$('#rsconfirmtext').html("<br/>");
								}
							});
							
							
						});
					// ENDED Restaurant Owner Password and Secure Code Confirmation JS
					</script>
				</form>
			</div>
			<div class="register-home">
				<a href="index">Home</a><br /><br />
			</div>
		</div>
		<!-- CONTAINER 2 FINISH -->
	</div>
<!-- //register -->