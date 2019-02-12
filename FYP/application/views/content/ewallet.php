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
			<h2>Privacy Policy</h2>
	</div>
	<div class="contentx">

	<div class="panel-group list-group role="tablist" >
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="collapseListGroupHeading1">
      <h4 class="panel-title">
        <a class="collapsed list-group-item list-group-item-action" data-toggle="collapse" href="#collapseListGroup1" aria-expanded="false" aria-controls="collapseListGroup1">
          Last Updated: 25-Sep-17
        </a>
      </h4>
    </div>
    <div id="collapseListGroup1" class="panel-collapse collapsing" role="tabpanel" aria-labelledby="collapseListGroupHeading1">
      <ul class="list-group">
        <li class="list-group-item">Please read the <a href="terms" class="alert-link">Terms & Conditions!</a></h4>. Set out below carefully before using <a href="index" class="alert-link">FoodPeazy website</a></h4>. By accessing to, downloading, installing or use of, the Website, and your ordering via the Website, you agree to be bound by these Terms and Conditions.</li>
      </ul>
    </div>
  </div>
  <div class="panel-heading" role="tab" id="collapseListGroupHeading2">
      <h4 class="panel-title">
        <a class="collapsed list-group-item list-group-item-action" data-toggle="collapse" href="#collapseListGroup2" aria-expanded="false" aria-controls="collapseListGroup2">
		1. Privacy Policy        
		</a>
      </h4>
    </div>
    <div id="collapseListGroup2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="collapseListGroupHeading2">
      <ul class="list-group">
        <li class="list-group-item">This Privacy Policy explains how FoodPeazy, uses your personal information which you provided to FoodPeazy when interacting with FoodPeazy or by using our service, including but not limited to our FoodPeazy website.<br> In this respect, you shall be responsible for providing accurate, not misleading, complete and up-to-date personal information to FoodPeazy and consent to the processing of these personal information by FoodPeazy in Malaysia and outside Malaysia.<br>In the event of any conflict between the English and the Bahasa Malaysia version, the English version shall prevail.<br> FoodPeazy shall have the right to modify, update or amend the terms of this Privacy Policy at any time by placing the updated Privacy Policy on the Website. By continuing to interact with FoodPeazy or by continuing to use FoodPeazy’s services following the modifications, updates or amendments to this Privacy Policy shall signify your acceptance of such modifications, updates or amendments. <br>
“Personal Information” refers to personal data which you have provided to FoodPeazy and any information that can be used to identify you. <br>
“Processing” refers to collecting, holding, storing, recording, organizing, adapting, using, disclosing or cor-recting Personal Information. 
        </li>
      </ul>
    </div>
    <div class="panel-heading" role="tab" id="collapseListGroupHeading3">
      <h4 class="panel-title">
        <a class="collapsed list-group-item list-group-item-action" data-toggle="collapse" href="#collapseListGroup3" aria-expanded="false" aria-controls="collapseListGroup3">
		2. What Personal Information FoodPeazy collects from you?	
        </a>
      </h4>
    </div>
    <div id="collapseListGroup3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="collapseListGroupHeading3">
      <ul class="list-group">
        <li class="list-group-item">FoodPeazy collects Personal Information from you when you register with FoodPeazy, when you order goods or services from FoodPeazy or use the Website such as but not limited to your name, address, tele-phone number, NRIC/passport no., email address and credit/debit card details. FoodPeazy also collects Personal Information when you complete any customer survey. Website usage information may also be collected using cookies. <br>The provision of your Personal Information is voluntary. However, in the event you do not provide the re-quired Personal Information, FoodPeazy may not be able to communicate with you and/or to provide you with the services requested.

        </li>
      </ul>
    </div>
     <div class="panel-heading" role="tab" id="collapseListGroupHeading4">
      <h4 class="panel-title">
        <a class="collapsed list-group-item list-group-item-action" data-toggle="collapse" href="#collapseListGroup4" aria-expanded="false" aria-controls="collapseListGroup4">
		3. Cookies and Google Analytics

        </a>
      </h4>
    </div>
    <div id="collapseListGroup4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="collapseListGroupHeading4">
      <ul class="list-group">
        <li class="list-group-item">Cookies are small text files that are placed on your computer by websites that you visit.<br> They are widely used in order to make websites work, or work more efficiently, as well as to provide information to the own-ers of the site.<br> This Website uses Google Analytics, a web analytics service provided by Google, Inc. ("Google").<br> Google Analytics uses "cookies", which are text files saved on your computer, to help the Website analyze how you use the site.<br> The information generated by the cookie about your use of the Website will be transmitted to and stored by Google on servers in the United States.<br> If this Website anonymizes IP addresses, your IP address will be truncated by Google within a EU member state or other EEA state before being transmitted to the US. Only in exceptional situations will your full IP address be transmitted to Google servers in the United States and truncated there.<br> Google will use this information for the purpose of evaluating your use of the Website, compiling reports on Website activity for Website operators and providing other services relating to Website activity and internet usage.<br>
Google will not associate your IP address with any other data held by Google.<br> You may refuse the use of cookies by selecting the appropriate settings on your browser, however please note that if you do this you may not be able to use the full functionality of this Website.<br> By using this Web-site, you consent to the processing of Personal Information about you by Google in the manner and for the purposes set out above.<br>
You can also prevent Google from collecting Personal Information (including your IP address) via cookies and processing this Personal Information by downloading this browser plugin and installing it: https://tools.google.com/dlpage/gaoptout.
Most web browsers allow some control of most cookies through the browser settings.<br> To find out more about cookies, including how to see what cookies have been set and how to manage and delete them, visit www.allaboutcookies.org. 
      </ul>
    </div>
    <div class="panel-heading" role="tab" id="collapseListGroupHeading5">
      <h4 class="panel-title">
        <a class="collapsed list-group-item list-group-item-action" data-toggle="collapse" href="#collapseListGroup5" aria-expanded="false" aria-controls="collapseListGroup5">
		4. How will FoodPeazy use the Personal Information collected from you?

        </a>
      </h4>
    </div>
    <div id="collapseListGroup5" class="panel-collapse collapse" role="tabpanel" aria-labelledby="collapseListGroupHeading5">
      <ul class="list-group">
        <li class="list-group-item">Personal Information collected by FoodPeazy is used to process your order and to manage your account. FoodPeazy may also use your Personal Information to email you about other products or services that FoodPeazy thinks may be of interest to you and to comply with its obligations under applicable laws, where required. 

      </ul>
    </div>
    <div class="panel-heading" role="tab" id="collapseListGroupHeading6">
      <h4 class="panel-title">
        <a class="collapsed list-group-item list-group-item-action" data-toggle="collapse" href="#collapseListGroup6" aria-expanded="false" aria-controls="collapseListGroup6">
		5. Transfer and disclosure of Personal Information
        </a>
      </h4>
    </div>
    <div id="collapseListGroup6" class="panel-collapse collapse" role="tabpanel" aria-labelledby="collapseListGroupHeading6">
      <ul class="list-group">
        <li class="list-group-item">As FoodPeazy’s storage facilities and servers may be located in other jurisdictions, your Personal Infor-mation may be transferred to, stored, used and processed in a jurisdiction other than Malaysia.<br>
From time to time FoodPeazy may send your Personal Information to third parties which FoodPeazy con-siders may have goods or services which are of interest to you.<br> In processing your order, FoodPeazy may send your Personal Information to credit reference and fraud prevention agencies where permitted, under applicable laws.<br> If you do not wish to be contacted by third parties please email to FoodPeazy’s Data Compliance Officers at support@FoodPeazy.my. 

      </ul>
    </div>
    <div class="panel-heading" role="tab" id="collapseListGroupHeading7">
      <h4 class="panel-title">
        <a class="collapsed list-group-item list-group-item-action" data-toggle="collapse" href="#collapseListGroup7" aria-expanded="false" aria-controls="collapseListGroup7">
		6. Access to your Personal Information and rectification requests

        </a>
      </h4>
    </div>
    <div id="collapseListGroup7" class="panel-collapse collapse" role="tabpanel" aria-labelledby="collapseListGroupHeading7">
      <ul class="list-group">
        <li class="list-group-item">Subject to any exceptions under applicable laws, you have the right to request a copy of the Personal In-formation and rectify the Personal Information FoodPeazy holds on you at any time.<br> Please email to Food-panda’s Data Compliance Officer if you would like to receive a copy of this information, to submit a Per-sonal Information rectification request or if you seek further information on this Privacy Policy – support@FoodPeazy.my . <br>There will be a small charge for processing this Personal Information access re-quest. 
      </ul>
    </div>
     <div class="panel-heading" role="tab" id="collapseListGroupHeading8">
      <h4 class="panel-title">
        <a class="collapsed list-group-item list-group-item-action" data-toggle="collapse" href="#collapseListGroup8" aria-expanded="false" aria-controls="collapseListGroup8">
		7. Retention of your Personal Information

        </a>
      </h4>
    </div>
    <div id="collapseListGroup8" class="panel-collapse collapse" role="tabpanel" aria-labelledby="collapseListGroupHeading8">
      <ul class="list-group">
        <li class="list-group-item">FoodPeazy will retain your Personal Information for the duration necessary to fulfill the foregoing purposes and until you delete your FoodPeazy account. 

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
		9. Other Websites

        </a>
      </h4>
    </div>
    <div id="collapseListGroup10" class="panel-collapse collapse" role="tabpanel" aria-labelledby="collapseListGroupHeading10">
      <ul class="list-group">
        <li class="list-group-item">Our website may have links to other websites. This Privacy Policy only applies to this Website. You should therefore read the privacy policies of the other websites when you are using those sites. 
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

<!-- //register 