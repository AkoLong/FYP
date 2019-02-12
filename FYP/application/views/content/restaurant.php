<!--?php
echo "<pre>";
var_dump($prodRecords);
echo "</pre>";
die();
?-->
<?php
if(!$record)
{
	echo "<h1 style='width:100%;text-align:center;font-size:50px;'>No Restaurant Found. Please make sure you enter the correct URL.</h1>";
}
else
{
?>
	<style>
	.restaurant_head
		{
			background-image:url("<?=base_url();?>images/restaurant_head_bg.png");
			background-repeat: repeat-x;
			padding:20px 0;
		}
	.restaurant_profile
		{
			margin:auto;
			max-width:720px;
			height:180px;
			vertical-align: middle;
			position:relative;
		}
	.restaurant_profile img
		{
			width:180px;
		}
	.restaurant_image_box
		{
			background:white;
			padding:3px;
			border:1px solid rgba(166,166,166,1.00);
			border-radius:3px;
			display:table-cell;
		}
	.restaurant_text
		{			
			padding-left:10px;
			display:table-cell;
			height:180px;
			vertical-align: bottom;
			padding-bottom: 10px;
		}
	.restaurant_name
		{
			font-size:2em;
			color:white;
			text-shadow: 1px 1px 3px #000000;
		}
	.restaurant_update_time
		{
			padding-left:10px;
			font-size:0.8em;
			color:white;
			vertical-align: top;
		}
		.product_img
			{
				width:120px;
				height:120px;
				margin:5px;
				margin-right:15px;
				margin-left:15px;
			}
		.food_product
			{
				max-width:1080px;
				background-color:;
				margin:auto;
			}
		.product_price_box
			{
				width:200px;
				text-align: center;
			}
		.ori_price
			{
				
				background:rgba(0,0,0,0.2);
				display:inline-block;
				padding:0px 10px;
				border-radius:10px;
				font-weight:bold;
			}
		.sale_price
			{
				margin-top:2px;
				color:white;
				background:rgba(0,155,255,1.00);
				display:inline-block;
				padding:0px 10px;
				border-radius:10px;
				font-weight:bold;
			}
		.product_desc
			{
				width:72%;
				vertical-align: top;
				padding-top:5px;
				padding-right:10px;
				color:dimgray;
			}
		.product_name
			{
				height:50px;
				vertical-align: bottom;
				padding-bottom:3px;
			}
		.product_name_div
			{
				text-align: center;
				min-width:150px;
				padding:0px 10px;
				display:inline-block;
				font-size:1.1em;
				border-bottom:2px solid rgba(51,153,204,1);
			}
		.ori_price
			{
			}
		.product_button_div
			{
				text-align: center;
			}
		.category_table
			{
				padding-top:20px;
				margin-bottom:20px;
			}
		.category_name
			{
				color:orange;
				text-shadow: 1px 1px 1px black;
			}
		.category_text_div
			{
				text-align: center;
				min-width:300px;
				display:inline-block;
				font-weight:bold;
				font-size:1.2em;
				border-bottom:2px solid rgba(51,153,204,1);
			}
		.table_hr
			{
				margin:4px 0px;
			}
		.restaurant_review
			{
				padding:30px 0;
			}
		.restaurant_review hr
			{
				margin:10px;
			}
		.review_overall
			{
				margin-top:5px;
				margin-bottom:5px ;
				text-align:center;
				font-size:1.25em;
				color:white;
				text-shadow:0px 1px 1px darkgray;
			}
		.review_overall_top
			{
				width:80%;
				margin:auto;
				background-color:rgba(216,137,39,1.00);
				border-top-left-radius:25px;
				border-top-right-radius:25px;
				padding-top:3px;
				text-shadow:1px 1px 1px orange;
			}
		.review_overall_btm
			{
				width:80%;
				margin:auto;
				background-color:rgba(254,145,38,1.00);
				font-weight:700;
				border-bottom-left-radius:25px;
				border-bottom-right-radius:25px;
				padding-bottom:3px;
				text-shadow:1px 1px 1px black;
			}
		.rbody
			{
				max-width:1080px;
				margin:auto;
				background:white;
			}
		.review_box
			{

			}
		.review_profile_pic
			{
				margin-left:10px;
				background:white;
				padding:1px;
				border:1px solid rgba(166,166,166,1.00);
				border-radius:3px;
				float:left;
			}
		.review_profile_pic img
			{
				width:80px;
				height:80px;
			}
		.review_content
			{
				padding-left:10px;
				display:table-cell;
			}
		.review_user_head_box
			{
				padding-top:20px;
				padding-bottom:5px;
			}
		.review_username
			{
				font-size:1.15em;
			}
		.review_content i
			{
				color:rgba(137,143,156,1);
			}
		.review_rating
			{
				width:50px;
				border-radius:50px;
				border:none;
				display:inline-block;
				background-color:rgba(0,155,255,1.00);
				color:white;
				font-weight:bold;
				text-align:center;
			}
		.review_user_head_box input[type="range"]
			{
				margin:0;
				padding:0;
				display:list-item;
				max-width:100px;
				display:table-cell;
			}
		.review_textarea
			{
				width:100%;
				padding:5px 10px;
			}
		.restaurant_info_map
			{
				margin:auto;
				display:table;
			}
		.restaurant_info_map iframe
			{
				float:left;
				margin:auto;
				
			}
		.restaurant_info_title
			{
				color:inherit;
				font-size:2em;
				font-weight:600;
				font-family: 'Raleway', sans-serif;
				border-bottom:2px solid rgba(51,153,204,1);
				border-radius: 1px;
				padding:5px 10px;
			}
		.restaurant_info_box
			{
				margin:auto;
				display:table;
			}
		.restaurant_info_subtitle
			{
				margin:auto;
				margin-bottom:15px;
				padding:5px;
				width:300px;
				border-bottom:2px solid rgba(51,153,204,1);
				font-weight:600;
				font-size:1.5em;
				display:inline-block;
			}
		.restaurant_info_r
			{
				margin:10px;
				padding:0px 10px;
				background-color: rgba(0,0,0,0.05);
				width:500px;display:inline-table;
			}
		.restaurant_info_o
			{
				background:rgba(0,0,0,0.05); width:500px;display:inline-table;
			}
		.restaurant_info_r_content
			{
				
			}
		.restaurant_info_o_content
			{
				
			}
		.restaurant_info_box ul
			{
				padding:2px;
				list-style-type:none;
			}
		.r_status
			{
				display:table;margin:auto;font-weight:bold;width:300px;text-align:center;color:white;text-shadow:1px 1px 2px black;background-color:rgba(123,255,60,1);border-radius:7px;
			}
		.r_live_status
			{
				display:table;margin:auto;font-weight:bold;width:300px;text-align:center;color:white;text-shadow:1px 1px 2px black;background-color:rgba(123,255,60,1);border-radius:7px;
			}
		.r_status_title
			{
				font-size:1.1em;
				font-family:'Raleway', sans-serif;
				text-decoration:underline;
				font-style:italic;
				padding:5px;
			}
		.r_ul_title
			{
				font-size:1.3em;
				text-decoration: underline;
				font-style:italic;
				margin: 2px 0px;
				text-align: left;
			}
		.r_inner_li
			{
				margin-bottom:10px;
			}
		.r_inner_li_title
			{
				font-size:1.1em;
				font-weight:600;
			}
			.restaurant_nav_ul li a
		{
			color:black;
		}
		.col-md-4
		{
			margin-bottom:30px;
		}
	</style>
	<div class="restaurant_head clearfix">
			<div class="restaurant_profile"><div class="restaurant_image_box"><img src="<?=base_url().$record['restaurant_image_path'];?>"></div>
			<div class="restaurant_text">
				<span class="restaurant_name"><?=$record['restaurant_name'];?></span><br>
				<span style="color:white;">Rating: <?=$record['restaurant_rating'];?> / 5.00</span><br>
				<span class="restaurant_update_time">latest updated by : <?=$record['restaurant_updated_date'];?></span>
			</div>
			</div>
	</div>
	<!--div class="review_overall"><div class="review_overall_top">Overall Rating</div><div class="review_overall_btm"><?=$record['restaurant_rating'];?> / 5.00</div></div-->
	<!--restaurant navigation-->
	<style>
	</style>
	<div class="navigation-agileits" style="background-color:rgba(43,42,42,0.8);">
		<div class="container">
			<nav class="navbar navbar-default">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div>
					<ul class="nav navbar-nav restaurant_nav_ul">
					<!-- Mega Menu -->
						<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Menu<strong class="caret"></strong></a>
							<ul class="dropdown-menu multi-column columns-3">
								<div class="row">
								<div class="multi-gd-img">
								<ul class="multi-column-dropdown">
									<li><a class="menu_all_button" id='all' style="padding-top:10px;"><h6 style="font-size:1.1em;padding:0;padding-bottom:10px;font-weight:normal;">All Categories</h6></a></li>
									<?php
									foreach($prodType as $num => $type)
									{
										$iddd 	= $prodTypeTrim[$num];
										echo "
										<li>
										<a class='menu' id='{$iddd}' onclick='showsub(\"div_{$iddd}\")'>{$type}</a>
										</li>
										";
									}
									?>
								</ul>
								</div>
								</div>
							</ul>
						</li>
						<li><a class="menu_info">Info</a></li>
						<li><a class="menu_review">Review</a></li>
					</ul>
				</div>
			</nav>
		</div>
	</div>
		<!-- end restaurant navigation -->
	<div class="restaurant_content">
		<!--div class="restaurant_menu">
		<br>
			<div class="food_product">
				<table class="category_table">
					<tr><td colspan="3"><legend class="category_name"><div class="category_text_div">Food Category 1</div></legend></td></tr>
					<tr><td rowspan=2><img class="product_img"></td><td class="product_name"><div class="product_name_div">Food Name</div></td><td class="product_price_box"><div class="ori_price"><strike>RM 10.00</strike></div><div><div class="sale_price">RM 5.00</div></div></td></tr>
					<tr><td class="product_desc">Description</td><td class="product_button_div"><button>Add to cart</button></td></tr>
					<tr><td colspan="3"><hr class="table_hr"></td></tr>
				</table>
			</div>
		</div-->
		<div class="restaurant_menu">
		<h1 id='mess' style='width:100%;text-align:center;margin-top:25px'></h1>
		<div class="products">
			<div class="container">
			<div class="agile_top_brands_grids">
				<div class="menu_all">
				<?php
					foreach($prodRecords as $num 	=> $attr)
					{
						$url 	= base_url().$attr['product_image_path'];
						$id 	= $attr['product_id'];
						$name 	= $attr['product_name'];
						$price 	= $attr['product_price'];
						$dprice	= $attr['product_discounted_price'];
						$desc 	= $attr['product_description'];
						echo "
						<div class='col-md-4 top_brand_left'>
						<div class='hover14 column'>
						<div class='agile_top_brand_left_grid'>
						<div class='agile_top_brand_left_grid_pos'>
						<img class='img-responsive' src='".base_url()."images/offer.png'/>
						</div>
						<div class='agile_top_brand_left_grid1'>
						<figure>
						<div class='snipcart-item block'>
						<div class='snipcart-thumb'>
							<img class='img-responsive' src='{$url}'/>
							<p>{$name}</p>
							<h4>RM{$dprice}<span>RM{$price}</span></h4>
							<p style='font-size:13px'>{$desc}</p>
							<div class='snipcart-details top_brand_home_details'>";
							if(($identity =='unregistered'||$identity=='customer') && $record['restaurant_life_status']!='closed' && $record['restaurant_life_status']!='rest')
							{
								echo "
								<form>
								<fieldset>
								<input type='hidden' class='id' value='{$id}'/>
								<input type='hidden' class='name' value='{$name}'/>
								<input type='hidden' class='price' value='{$dprice}'/>
								<input type='button' class='addtocart' value='Add To Cart' />
								</fieldset>
								</form>
								";
							}
							elseif($identity=='owner' && $this->session->userdata('id')==$record['owner_id'])
							{
								echo "
								<a href='productForm?id={$id}'><p>Edit</p></a>
								<a href='deleteProduct?id={$id}'><p>Delete Product</p></a>
								";
							}
						echo "
							</div>
						</div>
						</div>
						</figure>
						</div>
						</div>
						</div>
						</div>
						";
					}
					if($identity=='owner' && $this->session->userdata('id')==$record['owner_id'])
					{
						echo "
						<div class='col-md-4 top_brand_left'>
						<div class='hover14 column'>
						<div class='agile_top_brand_left_grid'>
						<div class='agile_top_brand_left_grid_pos'>
						</div>
						<div class='agile_top_brand_left_grid1'>
						<figure>
						<div class='snipcart-item block'>
						<div class='snipcart-thumb'>
						<a href='productForm'><p>Add Product</p></a>
						</div>
						</div>
						</figure>
						</div>
						</div>
						</div>
						</div>
						";
					}
				?>
				</div>
				<?php
					foreach($productsByType as $type => $numRec)
					{
						echo "<div class='div_{$type}'>";
						foreach($numRec as $num 	=> $attr)
						{
							$url 	= base_url().$attr['product_image_path'];
							$id 	= $attr['product_id'];
							$name 	= $attr['product_name'];
							$price 	= $attr['product_price'];
							$dprice	= $attr['product_discounted_price'];
							$desc 	= $attr['product_description'];
							echo "
							<div class='col-md-4 top_brand_left'>
							<div class='hover14 column'>
							<div class='agile_top_brand_left_grid'>
							<div class='agile_top_brand_left_grid_pos'>
							<img class='img-responsive' src='".base_url()."images/offer.png'/>
							</div>
							<div class='agile_top_brand_left_grid1'>
							<figure>
							<div class='snipcart-item block'>
							<div class='snipcart-thumb'>
								<img class='img-responsive' src='{$url}'/>
								<p>{$name}</p>
								<h4>RM{$dprice}<span>RM{$price}</span></h4>
								<p style='font-size:13px'>{$desc}</p>
								<div class='snipcart-details top_brand_home_details'>";
								if(($identity =='unregistered'||$identity=='customer') && $record['restaurant_life_status']!='closed' && $record['restaurant_life_status']!='rest')
								{
									echo "
									<form>
									<fieldset>
									<input type='hidden' class='id' value='{$id}'/>
									<input type='hidden' class='name' value='{$name}'/>
									<input type='hidden' class='price' value='{$dprice}'/>
									<input type='button' class='addtocart' value='Add To Cart' />
									</fieldset>
									</form>
									";
								}
								elseif($identity=='owner' && $this->session->userdata('id')==$record['owner_id'])
								{
									echo "
									<a href='productForm?id={$id}'><p>Edit</p></a>
									";
								}
							echo "
								</div>
							</div>
							</div>
							</figure>
							</div>
							</div>
							</div>
							</div>
							";
						}
						echo "</div>";
					}
				?>
			</div>
			</div>
		</div>	
		</div>
		<div class="restaurant_info">
			<div class="clearfix" style="text-align: center;padding:15px 0px;">
				<span class="restaurant_info_title">INFO</span><br/><br/>
				<?php
					if($identity=='owner' && $this->session->userdata('id')==$record['owner_id'])
					{
						echo "<a href='restaurantForm'>Edit Restaurant</a>";
					}
				?>
				<div class="restaurant_info_box">
					<div class="restaurant_info_r">
						<div><div class="restaurant_info_subtitle">RESTAURANT INFO</div></div>
						
						<div class="restaurant_info_r_content">
							<div>
								<div class="r_status_title">Live Status</div>
								<div class="r_live_status"><?=$record['restaurant_life_status'];?></div>
								<div class="r_status_title">Restaurant Status</div>
								<div class="r_status"><?=$record['restaurant_status'];?></div>
							</div>
							<hr style="margin:5px 0px;">
							<ul>
								<li>
									<span class="r_ul_title">Restaurant Description</span>
									<ul><li class="r_inner_li"><span class="r_descirption"><?=$record['restaurant_description'];?></span></li></ul>
								</li>
								<li>
									<span class="r_ul_title">Contact</span>
									<ul><li class="r_inner_li"><span class="r_inner_li_title">Restaurant Phone No. :</span>
											<ul><li class="r_sinner_li"><span class="r_contact"><?=$record['restaurant_contact'];?></span></li></ul>
										</li>
										<span class="r_inner_li_title">Address :</span>
											<ul><li class="r_sinner_li"><span class="r_address"><?=$record['restaurant_address'];?></span></li></ul>
										</li></ul>
								</li>
								<li>
									<span class="r_ul_title">Delivery Info</span>
									<?php
									if($record['restaurant_deliver_fee'])
									{
									?>
									<ul>
									
										<li class="r_inner_li"><span class="r_inner_li_title">Estimated Delivery Time :</span>
											<ul><li class="r_sinner_li"><span class="r_delivery_time"><?=$record['restaurant_deliver_time'];?></li></ul>
										</li>
										<li class="r_inner_li"><span class="r_inner_li_title">Delivery Minimum :</span>
											<ul><li class="r_sinner_li">RM <span class="r_delivery_minimum_order"><?=$record['restaurant_deliver_minimum_order'];?></span></li></ul>
										</li>
										<li class="r_inner_li"><span class="r_inner_li_title">Fee :</span>
											<ul><li class="r_sinner_li">RM <span class="r_delivery_fee"><?=$record['restaurant_deliver_fee'];?></span></li></ul>
										</li>
										<li class="r_inner_li"><span class="r_inner_li_title">Area Coverage :</span>
											<ul><li class="r_sinner_li"><span class="r_delivery_coverage"><?=$record['restaurant_deliver_coverage'];?></span></li></ul>
										</li>
									</ul>
									<?php
									}
									else
									{
										echo "<p>Sorry, the delivery services for this restaurant is not available at our system yet because restaurant is not registered.</p><p>Owner of this business? Click <a href='regform01'>me</a> to registered to this restaurant.</p>";
									}?>
								</li>
								<li>
									<span class="r_ul_title">Business Hours</span>
									<ul><li class="r_inner_li"><span class=""><?=$record['restaurant_business_hour'];?></span></li></ul>
								</li>
							</ul>
						</div>
					</div>
					<div class="restaurant_info_o">
						<div><div class="restaurant_info_subtitle">OWNER INFO</div></div>
						<div class="restaurant_info_o_content">
							<ul>
								<li>
									<span class="r_ul_title">Owner Name</span>
									<ul><li class="r_inner_li"><a class="owner_name" style="font-size:1.2em;"><?=$record['owner_name'];?></a></li></ul>
								</li>
								<li>
									<span class="r_ul_title">Contact</span>
									<ul><li class="r_inner_li"><span class="r_inner_li_title">Owner Phone No. :</span>
											<ul><li class="r_sinner_li"><span class="o_contact"><?=$record['owner_contact'];?></span></li></ul>
										</li>
										<li class="r_inner_li"><span class="r_inner_li_title">Owner Email :</span>
											<ul><li class="r_sinner_li"><span class="o_email"><?=$record['owner_email'];?></span></li></ul>
										</li></ul>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div style="text-align: center;padding:10px 0px;">
				<span class="restaurant_info_title">LOCATE US</span>
			</div>
			<br/>
			<div class="restaurant_info_map clearfix">
				<iframe width="480" height="360" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.it/maps?q=<?php echo "cyberjaya"; ?>&output=embed"></iframe>
			</div>
			<br><br>
		</div>
		<div class="restaurant_review rbody">
			<span>Rated By <?=$record['restaurant_rated_by'];?> Customer(s)</span>
			<hr/>
			<?php
			if($revRecords)
			{
				foreach($revRecords as $num => $attrArray)
				{				
					$name 	= $attrArray['review_customer_name'];
					$rating 	= $attrArray['review_rating'];
					$content 	= $attrArray['review_content'];
					echo "<div class='review_box clearfix'>
					<div class='review_profile_pic'><img/></div>
					<div class='review_content'>
						<div class='review_user_head_box'>
							<span class='review_username'><a>{$name}</a></span> <i>has rated</i> <div class='review_rating'><span>{$rating}</span></div>
						</div>
						<span class='review_text'>{$content}</span>
					</div>
					</div>";
				}
			}
			else
			{
				echo "<h2 style='width:100%;text-align:center;'>Be the first one to rate this restaurant?</h2>";
			}
			?>
			<!--div class="review_box clearfix">
				<div class="review_profile_pic"><img/></div>
				<div class="review_content">
					<div class="review_user_head_box"><span class="review_username"><a>Profile Name</a></span> <i>has rated</i>
					  <div class="review_rating"><span>5.0</span></div>
					</div>
					asdasdasdasdasdasdaaaa aaaaaaaaaaaaaaaaaaaaaaaa aaaaaaaaaaaaaaaaaaaaaa aaaaaaaaaaaaaaaaaaaa</div>
			</div>
			<hr/>
			<div class="review_box clearfix">
				<div class="review_profile_pic"><img/></div>
				<div class="review_content">
					<div class="review_user_head_box">
						<span class="review_username"><a>Profile Name</a></span> <i>has rated</i> <div class="review_rating"><span>5.0</span></div>
					</div>
					<span class="review_text">asdasdasdasdasdasdaaaa aaaaaaaaaaaaaaaaaaaaaaaa aaaaaaaaaaaaaaaaaaaaaa aaaaaaaaaaaaaaaaaaaa</span>
				</div>
			</div-->
			<hr/>
			<?php
			if($identity == 'customer')
			{
				?>
				<div class="clearfix">
					<form action='submitReview' method='post'>
						<fieldset>
							<div class="review_profile_pic"><img/></div>
							<div class="review_content" >
								<div class="review_user_head_box">
									<input type='hidden' value='<?=isset($record['restaurant_id'])?$record['restaurant_id']:null;?>' name='hidRID'/>
									<span class="review_username"><a><?=$this->session->userdata('custname');?></a></span> 
									<span>Rating : 1 <input name='rangRate' type="range" min=1 max=5 value=3 /> 5</span>
								</div>
								<textarea name='txtContent' class="review_textarea" rows=2 cols=80 placeholder="Your Review..."></textarea>
								<div><input class="review_submit" type="submit"></div>
							</div>
						</fieldset>
					</form>
				</div>
				<?php
			}
			elseif($identity =='unregistered')
			{
				echo "<h4 style='width:100%;text-align:center;'>Login as a customer to leave a review... </h4><br /><h4 style='width:100%;text-align:center;'>New User? Click <a href='regform01'>me</a> to register an account.</h4>";
			}
			else
			{
				echo "<h4 style='width:100%;text-align:center;'>Login as a customer to leave a review...</h4>";
			}
			?>
		</div>
	</div>
	<script> //JQuery for restaurant content
	function showsub(thatdiv)
		{
			$(".restaurant_menu").show();
			$(".restaurant_info").hide();
			$(".restaurant_review").hide();
			$(".agile_top_brands_grids").children().hide();
			$('.'+thatdiv).show();
		}
	$(document).ready(function() {
		var deliveryfee 		 = "<?=isset($record['restaurant_deliver_fee'])?$record['restaurant_deliver_fee']:null;?>";
		$(".restaurant_info").hide();
		$(".restaurant_review").hide();
		$(".agile_top_brands_grids").children().hide();
		$(".menu_all").show();
		$(".menu_info").click(function(){
			$(".restaurant_menu").hide();
			$(".agile_top_brands_grids").children().hide();
			$(".restaurant_review").hide();
			$(".restaurant_info").show();
		});
		$(".menu_review").click(function(){
			$(".restaurant_menu").hide();
			$(".agile_top_brands_grids").children().hide();
			$(".restaurant_review").show();
			$(".restaurant_info").hide();
		});
		$(".menu_all_button").click(function(){
			$(".restaurant_menu").show();
			$(".agile_top_brands_grids").children().hide();
			$(".menu_all").show();
			$(".restaurant_review").hide();
			$(".restaurant_info").hide();
		});
		var livestatus 			= "<?=$record['restaurant_life_status']?>";
		if(livestatus == 'closed' ||livestatus == '-'||livestatus == 'rest')
		{
			if(livestatus =='-')
				livestatus = 'not registered to our system';
			else if (livestatus =='rest')
				livestatus = 'on '+livestatus;
			$('.addtocart').attr('disabled');
			$('#mess').html("Sorry, this restaurant is currently "+livestatus+".");
		}
		else if(livestatus == 'busy')
		{
			$('#mess').html('This restaurant is currently busy, your order might takes some time to process.');
		}
	});
	</script>                             <!--***********************RESTAURANT PAGE DONE******************-->
	
<?php
}
?>