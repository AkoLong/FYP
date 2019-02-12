<!-- checkout -->
<!--?php
echo "<pre>";
var_dump($cartItem);
echo "</pre>";
?-->
	<div class="checkout">
		<div class="container">
			<h2>Your shopping cart contains: <span><?=count($cartItem);?></span></h2>
			<div class="checkout-right">
				<table class="timetable_sub">
					<thead>
						<tr>
							<th>SL No.</th>	
							<th>Product</th>
							<th>Quality</th>
							<th>Product Name</th>
							<th>Unit Price</th>
							<th>Total Price</th>
							<th>Remove</th>
						</tr>
					</thead>
					<?php
					foreach($cartItem as $num => $attr)
					{
						$zz 	= $num+1;
						$url 	= base_url().$attr['cart_product_url'];
						$n 		= $attr['cart_product_quantity'];
						$name 		= $attr['cart_product_name'];
						$price 		= $attr['cart_product_price'];
						$tot 		= $attr['cart_product_total'];
						$idd 		= $attr['cart_product_id'];
						echo "
						<tr class='rem{$zz}' id='{$idd}'>
							<td class='invert'>{$zz}</td>
							<td class='invert-image' ><img style='width:150px;' src='{$url}' class='img-responsive'/></td>
							<td class='invert'>
								<div class='quantity'> 
								<div class='quantity-select'>                           
									<div class='entry value-minus'>&nbsp;</div>
									<div class='entry value'>{$n}</div>
									<div class='entry value-plus active'>&nbsp;</div>
									<input type='hidden' class='give_id' value='{$idd}'/>
								</div>
								</div>
							</td>
							<td class='invert'>{$name}</td>
							<td class='invert pricez'>{$price}</td>
							<td class='invert tot'>{$tot}</td>
							<td class='invert'>
							<div class='rem'>
								<div class='close{$zz}'> </div>
							</div>
							<script>$(document).ready(function(c) {
								$('.close{$zz}').on('click', function(c){
									$('.rem{$zz}').fadeOut('slow', function(c){
										$('.rem{$zz}').remove();
										$('.li_{$idd}').remove();
										updatetotal();
									});
									});	  
								});
						   </script>
							</td>
						</tr>
						";
					}
					?>
					<!--quantity-->
					<script>
					$(function(){ 
						var money 	= "<?=$this->session->userdata('ewallet');?>";
						money 	= parseFloat(money);
						var grandTotal 	= parseFloat($("#grandTotal").html());
						/*if(money <grandTotal)
						{
							$("#payBtn01").attr("disabled","");
							alert("You do not have enough money in your e-wallet. Please top-up before proceed to payment.");
						}*/
						$("#txtAddress").hide();
						$("#option02").on("change",function(){
							if($("#option02").is(':checked'))
							{
								$("#txtAddress").attr('required','').show();
							}
						});
						$("#option01").on("change",function(){
							if($("#option01").is(':checked'))
							{
								$('#txtAddress').removeAttr('required').hide();
							}
						});
						/*$('.qtyttt').on("DOMSubtreeModified",function(){//it wont work, can be used as references.
							var qty 	= parseInt($(this).html());
							var target 	= $(this).parent().parent().parent().parent().parent().find(".tot");
							var id 		= $(this).parent().parent().parent().parent().parent().attr("id");
							alert(id);
							var price 	= parseFloat($(this).parent().parent().parent().parent().parent().find(".pricez").html());
							var newprice 	= price * qty;
							$("."+target).html(newprice);
						});*/
					});
					$('.value-plus').on('click', function(){
						var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)+1;
						divUpd.text(newVal);
						var pprice= parseFloat($(this).parent().parent().parent().parent().find(".pricez").html());
						$(this).parent().parent().parent().parent().find(".tot").text((parseFloat(newVal)*pprice).toFixed(2));
						var give_id=$(this).parent().find(".give_id").val();
						$(".stot_"+give_id).attr("value",newVal*pprice);
						$(".spstot_"+give_id).text((newVal*pprice).toFixed(2));
						$(".bQty_"+give_id).attr("value",newVal);
						updatetotal();
						var money 	= "<?=$this->session->userdata('ewallet');?>";
						var grand   = parseFloat($("#grandTotal").text());
						if(money<grand&&($("input[name=deli_or_cod]:checked").attr("value")=="e-wallet"))
						{
							alert("You do not have enough money in your e-wallet. Please top-up before proceed to payment.");
							$(this).parent().find(".value-minus").click();
						}
					});
						$('.value-minus').on('click', function(){
							var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)-1;
							if(newVal>=1) divUpd.text(newVal);
							if(newVal>=1)
							{
								var pprice= parseFloat($(this).parent().parent().parent().parent().find(".pricez").html());
								$(this).parent().parent().parent().parent().find(".tot").text((parseFloat(newVal)*pprice).toFixed(2));
								var give_id=$(this).parent().find(".give_id").val();
								$(".stot_"+give_id).text(newVal*pprice);
								$(".spstot_"+give_id).text((newVal*pprice).toFixed(2));
								$(".bQty_"+give_id).attr("value",newVal);
								updatetotal();
							}
						});
					function updatetotal()
					{
						var money 	= "<?=$this->session->userdata('ewallet');?>";
						money 	= parseFloat(money);
						var grandTotal 	= parseFloat($("#grandTotal").html());
						var sum=0;
						var delivery=parseFloat(<?=$restaurant_deliver_fee;?>);
						
						$(".spstot").each(function(){
							sum+= parseFloat($(this).text());
						});
						
						if(sum==0 ||(sum+delivery)>money)
						{
							if($("input[name=deli_or_cod]:checked").attr("value")=="e-wallet")
								$("#payBtn01").attr("disabled","");
							else if($("input[name=deli_or_cod]:checked").attr("value")=="cash_on_delivery")
								$("#payBtn01").removeAttr("disabled");
							else
								$("#payBtn01").attr("disabled","");
						}
						else
						{
							$("#payBtn01").removeAttr("disabled");
						}
						sum+=delivery;
							$("#grandTotal").text(sum.toFixed(2));
					}
					</script>
					<!--quantity-->
				</table>
			</div>
			<div class="checkout-left">	
				<div class="checkout-left-basket">
				<label style="color:red;font-size:20px;"><?=isset($error)?$error:null;?></label>
					<form action='p_checkout' method='post'>
					<h4 class="theh"><input type='submit' value='Proceed to Payment' id='payBtn01'/></h4>
					<input type='hidden' name='hidCt' id='counter01' value='<?=count($cartItem);?>' />
					<ul>
						<?php
						$grandTotal 	= $restaurant_deliver_fee;
						foreach($cartItem as $num => $attr)
						{
							$zz 	= $num+1;
							$url 	= base_url().$attr['cart_product_url'];
							$n 		= $attr['cart_product_quantity'];
							$name 		= $attr['cart_product_name'];
							$price 		= $attr['cart_product_price'];
							$tot 		= $attr['cart_product_total'];
							$idd 		= $attr['cart_product_id'];
							$grandTotal		+= $tot; 		
							echo "
							<li class='li_{$idd}'>
							{$name} <i>-</i><span>RM <input class='stot_{$idd}' name='basTot_{$num}' type='hidden' value='{$tot}'><span class='spstot_{$idd} spstot'>".number_format($tot, 2, '.', '')."</span></span>
							<input type='hidden' value='{$idd}' name='basId_{$num}'/>
							<input type='hidden' value='{$price}' name='basPrice_{$num}'/>
							<input type='hidden' value='{$name}' name='basName_{$num}'/>
							<input id='' type='hidden' value='{$n}' class='bQty_{$idd}' name='basQty_{$num}'/>
							</li>
							";
						}
						?>
						<!--li>Product1 <i>-</i> <span>$15.00 </span></li>
						<li>Product2 <i>-</i> <span>$25.00 </span></li>
						<li>Product3 <i>-</i> <span>$29.00 </span></li-->
						<li>Total Delivery Charges <i>-</i> <span>RM <?=$restaurant_deliver_fee;?><input class="deliverycharge" name='basDel' type='hidden' value='<?=$restaurant_deliver_fee?>'/></span></li>
						<li>Total <i>-</i> <span>RM <span id='grandTotal'><?=number_format($grandTotal, 2, '.', '');?></span></span></li>
					</ul>
					<br />
					<div class='Secure'>
					<input class='form-control' type='password' name='txtSecure' placeholder='Secure Code' maxlength='6' required/>
					</div><br />
					<?php
					if($restaurant_cod == 1)
					{
					?>
					<div class='deli_cod'>
						<label class='deli_cod_label'>Payment Method</label>
						<div class="btn-group deli_cod_btn" data-toggle="buttons">
							<label class="btn btn-primary active">
							<input name="radPayMeth" value="e-wallet" type="radio" id="delioption01" autocomplete="off" checked> E-Wallet
							</label>
							<label class="btn btn-primary">
							<input name="radPayMeth" value="cash_on_delivery" type="radio" id="delioption02" autocomplete="off"> Cash On Delivery
							</label>
						</div><br /><br />
					</div>
					<?php
					}
					else
					{
					?>
					<label>This restaurant do not provide cash on delivery features.</label>
					<input type='hidden' name='radPayMeth' value='e-wallet'/>
					<?php
					}
					?>
					<div class='address'>
						<label class='address'>Delivery Address :</label>
						<div class="btn-group address" data-toggle="buttons">
							<label class="btn btn-primary active">
							<input name="radAddress" value="Default Address" type="radio" id="option01" autocomplete="off" checked> Default Address
							</label>
							<label class="btn btn-primary">
							<input name="radAddress" value="Custom Address" type="radio" id="option02" autocomplete="off"> Custom Address
							</label>
						</div><br /><br />
						<textarea class='form-control' id='txtAddress' name='txtAddress' rows="4" maxlength="500"></textarea><br />
					</div>
					</form>
				</div>
				<div class="checkout-right-basket">
					<a href="restaurant?id=<?=$restaurant_id;?>"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Back to restaurant.</a>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
<script>
	$(document).ready(function(){
		var cod 	= "<?=$restaurant_cod;?>";
		updatetotal();
		$("input[name=deli_or_cod]").on("change",function(){
			updatetotal();
		});
	});
</script>
<style>
.checkout-left-basket .theh
{
	padding:0px;
	padding-bottom:10px;
}
#payBtn01
{
	width:100%;
	height:50px;
	border:none;
	background:rgba(55, 178, 230, 1);
	font-weight:bold;
	font-size:1.1em;
}
.checkout-left-basket .theh :hover 
{
	padding-top:10px;
}
#payBtn01:disabled
{
	opacity:0.7;
	background:rgba(155, 216, 243, 1);
}
</style>