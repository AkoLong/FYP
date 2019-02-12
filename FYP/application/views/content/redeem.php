<div class="register">
		<!--AKO ADDED tab selection (customer or restaurant owner) -->
		<h2>Redeem</h2>
		<br>
	 	<div id="regtab">
			<div class="clearfix" style="display:none;">
			  	<a class="regtablink" id="regtab1" onclick="opencustomer()">Debit / Credit Card</a>
				<a class="regtablink" id="regtab2" onclick="openowner()">Online Banking</a>
			</div>
		</div>
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
  <style>
		.date_input
			{
				margin-top:10px;
				padding-left:10px;
				width:50px;
				font-family: monospace;
				font-size:1.3em;
				height:35px;
			}
	  .tpamount
	  {
		  margin-top:10px;
		  vertical-align: center;
	  }
	  .amount
	  {
		  height:35px;
		  padding-left:10px;
	  }
	  		.whichbank
		{
			padding:10px 0px;
			margin-top:10px;
			padding-left:5px;
			border-radius:2px;
		}
		.bankpic
		{
			padding:10px;
			color:inherit;
			border:1px solid white;
			word-wrap: break-word;
			display:inline-block;
			border:1px solid gray;
		}
		
		.bankpic img
		{
			width:100px;
			height:100px;
			margin-bottom:5px;
			margin-top:5px;
		}
	</style>
	  <div class="container" id="container1">
		<div class="login-form-grids">
		  <h5 style="font-size:20px;">Bank account information</h5>
		  <hr />
		  <form action="p_redeem" method="post" id="form01">
				<input name="txtBankAccountNumber" type="text" placeholder="Bank Account Number" required=" " ><br />
				<input name="txtBankAccountName" type="text" placeholder="Account Owner Name" required=" " ><br />
				<label>Which bank are you using?</label><br>
			 	<select class="whichbank" name='selBank' required>
			 		<option value="1">Maybank</option>
			 		<option value="2" selected>CIMB Bank</option>
			 		<option value="3">Public Bank</option>
			 		<option value="4">RHB Bank</option>
			 		<option value="5">Hong Leong Bank</option>
			 		<option value="6">AmBank</option>
			 	</select><br><br>
			 	<div class="bankpic"><img src="" id="bankpicimg"></div>
				<br />
				<hr>
				<label>Redeem Amount</label><br>
				<div class="tpamount"><label>RM</label> <input class="amount" type="number" min="1.00" step="0.01" placeholder="Min: 1.00" required=" " name='txtAmount'></div>
				<br>
				<input type="submit" value="Proceed">
			</form>
		</div>
	</div>
  	<script>
		$(document).ready(function(){
			updatebankch($(".whichbank").val());
		});
		$(function(){
			$(".whichbank").on("change",function(event){
				var ch=$(this).val();
				updatebankch(ch);
			});
		});
		function updatebankch(ch)
		{
			var string=" ";
			switch(ch)
				{
					case '1':
						string="<?=base_url();?>images/a/maybank.png";
						break;
					case '2':
						string="<?=base_url();?>images/a/clicks-thumb.gif";
						break;
					case '3':
						string="<?=base_url();?>images/a/public.gif";
						break;
					case '4':
						string="<?=base_url();?>images/a/rhb.gif";
						break;
					case '5':
						string="<?=base_url();?>images/a/hl.png";
						break;
					case '6':
						string="<?=base_url();?>images/a/ambank.gif";
						break;
				}
			$("#bankpicimg").attr("src",string);
		}
	</script>
	</div>