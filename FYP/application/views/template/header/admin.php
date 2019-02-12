<body>
<script>
$(function(){
	$('.addtocart').on("click",function(){
		alert("You need to login as customer before you can make purchasement.");
	});
});
</script>
<!-- header -->
	<div class="agileits_header">
		<div class="container">
			<div class="w3l_offers">
				<p>Welcome, <?=$this->session->userdata('adname');?> <a href="#"></a></p>
			</div>
			<div class="agile-login">
				<ul>
<!-- 					<li><a href="registered"> Profile </a></li>
 -->					<li><a href="logout">Logout</a></li>
<!-- 					<li><a href="contact">Help</a></li>
 -->					
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