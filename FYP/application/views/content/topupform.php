<!-- register -->
	<div class="register">
		<!--AKO ADDED tab selection (customer or restaurant owner) -->
		<h2>Top up e-wallet</h2>
		<br>
	 	<div id="regtab">
			<div class="clearfix">
			  	<a class="regtablink" id="regtab1" onclick="opencustomer()">Debit / Credit Card</a>
				<a class="regtablink" id="regtab2" onclick="openowner()">Online Banking</a>
			</div>
		</div>
		<!-- Js -->
		<script>
			$(document).ready(function(){
				$("#regtab1").click();
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
	</style>
	  <div class="container" id="container1">
		<div class="login-form-grids">
				<h5 style="font-size:20px;">Debit / credit card information</h5>
				<hr />
		  <form action="p_topup" method="post" id="form01">
				<input name="txtCardNumber" type="text" placeholder="Card Number" required=" " maxlength='16'><br />
				<input name="nameoncard" type="text" placeholder="Full Name on Card" required=" " ><br />
				<input name="cvv" type="text" placeholder="CVV" required=" " ><br />
				<label>Expiry Date</label><br>
			 	<input type="number" min="1" max="12" placeholder="mm" class="date_input mdate" required=" "> / 
				<input type="number" min="00" max="99" placeholder="yy" class="date_input ydate" required=" "><br>
				<br />
				<hr>
				<label>Top Up Amount</label><br>
				<div class="tpamount"><label>RM</label> <input class="amount" type="number" min="1.00" step="0.01" placeholder="Min: 1.00" required=" " name='txtAmount'></div>
				<br>
				<input type="submit" value="Proceed">
			</form>
		</div>
	</div>
<!-- CONTAINER 1 FINNISH -->
  
<!-- CONTAINER 2 FOR RESTAURANT OWNER REGISTRATION-->
	<style>
		.bankpic
		{
			text-align: center;
			display:inline-block;padding:10px;
			color:inherit;
			border:1px solid white;
			word-wrap: break-word;
		}
		.bankpic:hover
		{
			border:1px solid gray;
		}
		.bankpic img
		{
			width:100px;
			height:100px;
			margin-bottom:5px;
			margin-top:5px;
		}
		.banklinkdiv
		{
			
		}
	</style>
	  <div class="container" id="container2">
		  <div class="login-form-grids">
		  <form action='p_topup' method='post' id='form2'>
		  <input type='hidden' value='yes' name='hidOnline'/>
		    <h5 style="font-size:20px;">Online banking</h5>
		    <hr /><br>
		    <label>Top Up Amount</label><br>
				<div class="tpamount"><label>RM</label> <input class="amount" type="number" min="1.00" step="0.01" placeholder="Min: 1.00" required=" " name='txtAmount'></div>
		    <hr>
		    <span><b>Choose a bank to be redirected and complete the payment:</b></span>
		    <br /><br/>
		    <div class="banklinkdiv">
		    	<a class="bankpic" href="#">
		    		<img src="<?=base_url();?>images/a/maybank.png"/><br>
		    		<label>Maybank</label>
		    	</a>
		    	<a class="bankpic" href="#">
		    		<img src="<?=base_url();?>images/a/ambank.gif"/><br>
		    		<label>AmBank</label>
		    	</a>
		    	<a class="bankpic" href="#">
		    		<img src="<?=base_url();?>images/a/clicks-thumb.gif"/><br>
		    		<label>CIMB Clicks</label>
		    	</a>
		    	<a class="bankpic" href="#">
		    		<img src="<?=base_url();?>images/a/public.gif"/><br>
		    		<label>Public Bank</label>
		    	</a>
		    	<a class="bankpic" href="#">
		    		<img src="<?=base_url();?>images/a/rhb.gif"/><br>
		    		<label>RHB Bank</label>
		    	</a>
		    	<a class="bankpic" href="#">
		    		<img src="<?=base_url();?>images/a/hl.png"/><br>
		    		<label style="">Hong Leong</label>
		    	</a>
		    </div>
		    <br>
		    <div>
				<span style="color:red;">*Note :</span>
		    	<div>
		    	<br>
		    		<b>Maybank2U</b> is offline from <i>12:00am</i> to <i>12:30am</i> daily.<br>
		    		<b>AmBank services</b> are available from <i>7:00am</i> to <i>11:00pm</i> daily.<br>
		    		<b>CIMBClicks</b> is offline from <i>11:45pm</i> to <i>12:15am</i> daily.<br>
		    		<b>PBE</b> is offline from <i>12:00am</i> to <i>1:00am</i> daily.<br>
		    		<b>RHB</b> is offline from <i>12:00am</i> to <i>12:30am</i> daily.<br>
		    		<b>Hong Leong Bank</b> is offline from <i>11:30pm</i> to <i>1:00am</i> daily.<br>
		    	</div>
		    </div>
			</form>
		  </div>
	  </div>
<!-- CONTAINER 2 FINISH -->
	</div>
	<script>
	$(function(){
		$(".bankpic").on("click",function(){
			$("#form2").submit();
		});
	});
	</script>