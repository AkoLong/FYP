<div class="register">
<div class="container">
<div class="login-form-grids">
<form action='p_changePassword' method='post'>
<label style="color:red;font-size:20px;"><?=isset($error)?$error:null;?></label>
<?=isset($error)?"<br /><hr /><br />":null?>
<input type='hidden' value='<?=$type?>' name ='type'/>
<input type='hidden' value='<?=$id?>' name ='id'/>
<h2>Change Your Password</h2>
<input type='password' name='txtPassword' placeholder='Password'  pattern=".{8,15}" class='form-control' id='cpassword'  maxlength="15" /><br />
<input type='password' placeholder='Password Confirmation'  pattern=".{8,15}" class='form-control' placeholder='Confirm Password' id='cpassword'  maxlength="15"/><br />
<input type='submit' value='Submit' />
</form>
</div>
</div>
</div>
<script>
$(function(){
	$('#cpconfirmtext').hide();
		$('#cpconfirm').focusin(function(){
		$('#cpconfirmtext').show();
	});
	$('#cpconfirm').focusout(function(){
		if($('#cpconfirmtext').val==""){
			$('#cpconfirmtext').hide();
		}
	});
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
});
</script>