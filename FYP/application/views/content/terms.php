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
		.contentx
		{
			margin-left:6%;
			margin-right:6%;
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
<!-- 		Content 	--> 	
 	<div class="container" id="container1">
			<h2>Terms and Conditions</h2>
	</div>
	<div class="contentx">

	<div class="panel-group list-group role="tablist" >
  <div class="panel panel-default">
   <!--  <div class="panel-heading" role="tab" id="collapseListGroupHeading1">
      <h4 class="panel-title">
        <a class="collapsed list-group-item list-group-item-action" data-toggle="collapse" href="#collapseListGroup1" aria-expanded="false" aria-controls="collapseListGroup1">
          Last Updated: 24-Sep-17
        </a>
      </h4>
    </div>
    <div id="collapseListGroup1" class="panel-collapse collapsing" role="tabpanel" aria-labelledby="collapseListGroupHeading1">
      <ul class="list-group">
        <li class="list-group-item">Please read the <a href="terms" class="alert-link">Terms & Conditions!</a></h4>. Set out below carefully before using <a href="index" class="alert-link">FoodPeazy website</a></h4>. By accessing to, downloading, installing or use of, the Website, and your ordering via the Website, you agree to be bound by these Terms and Conditions.</li>
      </ul>
    </div>
  </div> -->
  <div class="panel-heading" role="tab" id="collapseListGroupHeading2">
      <h4 class="panel-title">
        <a class="collapsed list-group-item list-group-item-action" data-toggle="collapse" href="#collapseListGroup2" aria-expanded="false" aria-controls="collapseListGroup2">
		1. Terminology        
		</a>
      </h4>
    </div>
    <div id="collapseListGroup2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="collapseListGroupHeading2">
      <ul class="list-group">
        <li class="list-group-item">The following terminology applies to these Terms of Service and Use and any or all agreements:<br><br>
		"Client", “You” and “Your” refer to you, the person accessing and/or using this website and accepting the Company’s terms and conditions.<br><br>
		"The Company", “Ourselves”, “FoodPeazy”, “We” and "Us", refer to our FoodPeazy
		“Party”, “Parties”, or “Us”, refer to both the Client and us, or either the Client or us.<br><br>
		“Affiliated Sites” refer to a third party who has agreed to be our affiliate and to host a link to our website.<br><br>
		“Services” refer to the services as offered by FoodPeazy on FoodPeazy Site.<br><br>
		All terms refer to the offer, acceptance and consideration of payment necessary to undertake the process of our assistance to the Client in the most appropriate manner, whether by formal meetings of a fixed duration, or any other means, for the express purpose of meeting the Client’s needs in respect of provision of the Company’s stated services/products, in accordance with and subject to, prevailing Malaysia Law. Any use of the above terminology or other words in the singular, plural, capitalisation and/or he/she or they, are taken as interchangeable and therefore as referring to the same.
        </li>
      </ul>
    </div>
    <div class="panel-heading" role="tab" id="collapseListGroupHeading3">
      <h4 class="panel-title">
        <a class="collapsed list-group-item list-group-item-action" data-toggle="collapse" href="#collapseListGroup3" aria-expanded="false" aria-controls="collapseListGroup3">
		2. Description	
        </a>
      </h4>
    </div>
    <div id="collapseListGroup3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="collapseListGroupHeading3">
      <ul class="list-group">
        <li class="list-group-item">FoodPeazy will provide users of the FoodPeazy Diner Site with access to order  food meals. FoodPeazy will make deliveries on the day the specified date the client wishes to have the client’s meals delivered.
        </li>
      </ul>
    </div>
     <div class="panel-heading" role="tab" id="collapseListGroupHeading4">
      <h4 class="panel-title">
        <a class="collapsed list-group-item list-group-item-action" data-toggle="collapse" href="#collapseListGroup4" aria-expanded="false" aria-controls="collapseListGroup4">
		3. Order Processing
        </a>
      </h4>
    </div>
    <div id="collapseListGroup4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="collapseListGroupHeading4">
      <ul class="list-group">
        <li class="list-group-item">FoodPeazy may, in its sole discretion, choose to not process or to cancel your food orders in certain circumstances. This may occur, for example, when the food meals you wish to order is no longer available due to food meals being sold out, out of coverage for delivery, or in other circumstances FoodPeazy deems inappropriate in its sole discretion. FoodPeazy also reserves the right, in its sole discretion, to take steps to verify your identity to process your orders. FoodPeazy will either not charge you or refund the charges for orders that we do not process or cancel.
      </ul>
    </div>
    <div class="panel-heading" role="tab" id="collapseListGroupHeading5">
      <h4 class="panel-title">
        <a class="collapsed list-group-item list-group-item-action" data-toggle="collapse" href="#collapseListGroup5" aria-expanded="false" aria-controls="collapseListGroup5">
		4. Special Request
        </a>
      </h4>
    </div>
    <div id="collapseListGroup5" class="panel-collapse collapse" role="tabpanel" aria-labelledby="collapseListGroupHeading5">
      <ul class="list-group">
        <li class="list-group-item">If you have any special requests when booking your food meals, you must submit them in the column provided before payment is made. FoodPeazy will try to meet the request of the client, where possible.
      </ul>
    </div>
    <div class="panel-heading" role="tab" id="collapseListGroupHeading6">
      <h4 class="panel-title">
        <a class="collapsed list-group-item list-group-item-action" data-toggle="collapse" href="#collapseListGroup6" aria-expanded="false" aria-controls="collapseListGroup6">
		5. Delivery
        </a>
      </h4>
    </div>
    <div id="collapseListGroup6" class="panel-collapse collapse" role="tabpanel" aria-labelledby="collapseListGroupHeading6">
      <ul class="list-group">
        <li class="list-group-item">FoodPeazy will try to meet the delivery time specified by the client however the delivery time will be dependent on traffic flow, weather conditions or incidences which may delay lunch boxes from being delivered on time.<br><br>FoodPeazy engages another company to deliver food to the client. Additional charges may apply for delivery outside these areas. The client is responsible to be available during the day of delivery and time of delivery. In an event where the client is unreachable, we will attempt to contact the client twice and if the client is still unreachable we will carry on delivering food to other clients.
      </ul>
    </div>
    <div class="panel-heading" role="tab" id="collapseListGroupHeading7">
      <h4 class="panel-title">
        <a class="collapsed list-group-item list-group-item-action" data-toggle="collapse" href="#collapseListGroup7" aria-expanded="false" aria-controls="collapseListGroup7">
		6. Payment
        </a>
      </h4>
    </div>
    <div id="collapseListGroup7" class="panel-collapse collapse" role="tabpanel" aria-labelledby="collapseListGroupHeading7">
      <ul class="list-group">
        <li class="list-group-item">All payment for food orders must be made in full before delivery of food meals. You further acknowledge and agree that the charges will be billed to your payment card, or that you will pay the charges using other payment method approved by FoodPeazy such as bank transfer or paypal.
      </ul>
    </div>
     <div class="panel-heading" role="tab" id="collapseListGroupHeading8">
      <h4 class="panel-title">
        <a class="collapsed list-group-item list-group-item-action" data-toggle="collapse" href="#collapseListGroup8" aria-expanded="false" aria-controls="collapseListGroup8">
		7. Visitor Conduct
        </a>
      </h4>
    </div>
    <div id="collapseListGroup8" class="panel-collapse collapse" role="tabpanel" aria-labelledby="collapseListGroupHeading8">
      <ul class="list-group">
        <li class="list-group-item">FoodPeazy does not have a policy of reviewing any messages, content or information which users of FoodPeazy Site may post thereon from time to time, your attention is drawn to the fact that FoodPeazy fully reserves the right to monitor all postings and to remove or to decline to accept any e-mail or postings from FoodPeazy Site if we decide that such postings are in contravention of the law or of this paragraph herein.<br><br>We will also fully co-operate with any law enforcement authorities or court order requiring us to disclose the identity or other details of any person posting material to our website in breach of these Terms of Service and Use.<br>We will not be liable for any loss or damage caused by a distributed denial-of-service attack, viruses or other technologically harmful material that may infect your computer equipment, computer programs, data or other proprietary material due to your use of our website or to your downloading of any material posted on it, or on any website linked to it.<br><br>By posting content to our website, you warrant and represent that you either own or otherwise control all of the rights to that content, including, without limitation, all the rights necessary for you to provide, post, upload, input or submit the content, or that your use of the content is a protected fair use.<br><br><h5>You agree to indemnify and hold FoodPeazy, harmless for any and all claims or demands, including reasonable attorney fees, that arise from or otherwise relate to your use of this website, any content you supply to this website, or your violation of these Terms of Service and use or the rights of another.</h5></li>
      </ul>
    </div>
     <div class="panel-heading" role="tab" id="collapseListGroupHeading9">
      <h4 class="panel-title">
        <a class="collapsed list-group-item list-group-item-action" data-toggle="collapse" href="#collapseListGroup9" aria-expanded="false" aria-controls="collapseListGroup9">
		8. Copyright Notice
        </a>
      </h4>
    </div>
    <div id="collapseListGroup9" class="panel-collapse collapse" role="tabpanel" aria-labelledby="collapseListGroupHeading9">
      <ul class="list-group">
        <li class="list-group-item">The copyright and other intellectual property rights in all material on this website are owned by FoodPeazy and must not be reproduced without our prior written consent. The material in this website includes, but is not limited to, the recipe, design, layout, look, text, appearance and graphics. Subject to the paragraph below, no part of this website may be reproduced without our prior written permission.<br><br>
You are permitted to use our website for your own personal use and to print and download material from this website provided that you do not modify any content without our consent. You are also free to bookmark and share links directing others to the content on this website. Material on this website must not otherwise be reproduced or republished, either online or offline, without our permission.
      </ul>
    </div>
     <div class="panel-heading" role="tab" id="collapseListGroupHeading10">
      <h4 class="panel-title">
        <a class="collapsed list-group-item list-group-item-action" data-toggle="collapse" href="#collapseListGroup10" aria-expanded="false" aria-controls="collapseListGroup10">
		9. Exclusion of Liability
        </a>
      </h4>
    </div>
    <div id="collapseListGroup10" class="panel-collapse collapse" role="tabpanel" aria-labelledby="collapseListGroupHeading10">
      <ul class="list-group">
        <li class="list-group-item">Neither we nor any other party (whether or not involved in producing, maintaining or delivering this website) shall be liable or responsible for any kind of loss or damage that may result to you or a third party as a result of your or their use of our website.<br><br>
This exclusion shall include servicing or repair costs and, without limitation, any other direct, indirect or consequential loss, and whether in tort or contract or otherwise in connection with this website.<br><br>Neither we nor any third parties provide any warranty or guarantee as to the accuracy, timeliness, performance, completeness or suitability of the information and materials found or offered on this website for any particular purpose. You acknowledge that such information and materials may contain inaccuracies or errors and to the extent permitted by law, we and third parties connected to us hereby expressly exclude:<br>(a) all conditions, warranties and other terms which might otherwise be implied by statute, common law or the law of equity.<br> (b) any liability for any direct, indirect or consequential loss or damage incurred by any user in connection with our site or in connection with the use, inability to use, or results of the use of our site, any websites linked to it and any materials posted on it, including, without limitation any liability for: <br>(c) loss of income or revenue; <br>(d) loss of business; <br>(e) loss of profits or contracts; <br>(f) loss of anticipated savings;<br>(g) loss of data; <br>(h) loss of goodwill; <br>(i) wasted management or office time; and for any other loss or damage of any kind, however arising and whether caused by tort (including negligence), breach of contract or otherwise, even if foreseeable, provided that this condition shall not prevent claims for loss of or damage to your tangible property or any other claims for direct financial loss that are not excluded by any of the categories set out above.
      </ul>
    </div>
    <div class="panel-heading" role="tab" id="collapseListGroupHeading11">
      <h4 class="panel-title">
        <a class="collapsed list-group-item list-group-item-action" data-toggle="collapse" href="#collapseListGroup11" aria-expanded="false" aria-controls="collapseListGroup11">
		10. Law and Jurisdiction
        </a>
      </h4>
    </div>
    <div id="collapseListGroup11" class="panel-collapse collapse" role="tabpanel" aria-labelledby="collapseListGroupHeading11">
      <ul class="list-group">
        <li class="list-group-item"><h4>These Terms and Conditions shall be governed by and construed in accordance with the laws of Malaysia. The parties hereto submit to the exclusive jurisdiction of the courts of Malaysia. All dealings, correspondence and contacts between us shall be made or conducted in the English language.</h4></li>
      </ul>
    </div>
</div>
</div>
</div>
<!-- //register 