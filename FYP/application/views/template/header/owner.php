<body>
<script>
	$(document).ready(function(){
		$(".hidewallet").click(function(){
			$(".wallet_text").toggleClass("showwallet");
		});
		$('.addtocart').on("click",function(){
		alert("You need to login as customer before you can make purchasement.");
	});
	});
</script>
<style>
	.wallet_text
	{	color:rgba(51,51,51,1);user-select:none;}
	.showwallet
	{	color:white;}
	.hidewallet
	{	background:white;color:black; height:20px;}
</style>
<!-- header -->
	<div class="agileits_header">
		<div class="container">
			<div class="w3l_offers">
				<p><button class="fa fa-low-vision hidewallet"></button> E-Wallet Balance : <span class="wallet_text">RM <?=$this->session->userdata('resbal')?> </span>&nbsp;<a href="redeem">REDEEM</a></p>
			</div>
			<div class="agile-login">
				<ul>
					<li><a href="ownerForm"> <?=$this->session->userdata('ownname');?> </a></li>
					<li><a href="logout">Logout</a></li>
					<li><a href="contact">Help</a></li>
					
				</ul>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>

	<div class="logo_products">
		<div class="container">
		<div class="w3ls_logo_products_left1">
				<ul class="phone_email">
					<li><i class="fa fa-phone" aria-hidden="true"></i>Need any help? Help desk : (+0123) 234 567</li>
					
				</ul>
			</div>
			<div class="w3ls_logo_products_left">
				<h1><a href="index"><img id="logo" width="100%" src="<?=base_url();?>images/logo.png"></a></h1>
			</div>
			
			<div class="clearfix"> </div>
		</div>
	</div>
<!-- //header -->