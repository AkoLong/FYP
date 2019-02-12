<!-- register -->
	<div class="register">
		<!--AKO ADDED tab selection (customer or restaurant owner) -->
	 	<!-- <div id="regtab">
			<div class="clearfix">
			  	<a class="regtablink" id="regtab1" onclick="opencustomer()">Customer</a>
				<a class="regtablink" id="regtab2" onclick="openowner()">Restaurant Owner</a>
			</div>
		</div> -->
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
				if(state!=null)
				{
					$('#selState').find('#'+state).attr("selected","selected");
				}
				if(state02!=null)
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
		.regpara{
				font-family: sans-serif;
                color: maroon;
                border-bottom: 1px solid rgb(200, 200, 200);
                margin-left: 3em;
			}
		.regpara1
		{

		}
		.list-group
		{
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
		<!-- 		Pop Up for effect   -->	
			<div class="alert alert-success" role="alert">
				<h4 class="alert-heading"><strong>Register Successfully!</strong> Be sure to read our  <a href="terms" class="alert-link">Terms & Conditions!</a></h4>

				<p><br>An <strong>Email</strong> has been sent to your email. Please follow the link in the email to verify your account and complete your verification.Once you have verified and verified by our Admins, you are good to go!</p>
				<hr>
				<p class="mb-0">Lets see what we have prepare for you while waiting for your email!</p>
			</div>
		

			<script type="text/javascript">
				alert("Hello! Thank you for becoming part of us!\n\t\t\t\tGlad to have you");
			</script>
		
 	<div class="container" id="container1">
			<h2>Wooohooooo Success!</h2>
	</div>

	<div class="regpara" id="regpara">
			<a><br>Let me secretly tell you...shhhhh. Here's what you can do after being verified by our Admin :  <br></a>
	</div>
	<div class="list-group">
	<ul class="list-group">
    <li class="list-group-item d-flex justify-content-between align-items-center">
        •Include your Estimated Time Delivery and Delivery Fees
        <span class="badge badge-primary badge-pill">✔</span>
    </li>
    <li class="list-group-item d-flex justify-content-between align-items-center">
        •Add Foods, Beverages, Snacks and etc 
        <span class="badge badge-primary badge-pill">✔</span>
    </li>
    <li class="list-group-item d-flex justify-content-between align-items-center">
        •Allow to add images for your Menus
        <span class="badge badge-primary badge-pill">✔</span>
    </li>
    <li class="list-group-item d-flex justify-content-between align-items-center">
        •Free 1-Month Subscription for Restaurant Owner. T&C Applied.
        <span class="badge badge-primary badge-pill">✔</span>
    </li>
    <li class="list-group-item d-flex justify-content-between align-items-center">
        •Allow Cancel Order, surcharge applied.
        <span class="badge badge-primary badge-pill">✔</span>
    </li>
</ul>
</div>

<!-- <!-- //register  -->
