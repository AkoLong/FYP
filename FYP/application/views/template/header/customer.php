<body>
<!-- header -->
	<div class="agileits_header">
		<div class="container">
			<div class="w3l_offers">
				<p>E-Wallet Balance : RM <?=$this->session->userdata('ewallet');?> &nbsp;<a href="topupform">TOP UP</a></p>
			</div>
			<div class="agile-login">
				<ul>
					<li><a href="customerProfile"><?=$this->session->userdata('custname')?> </a></li>
					<li><a href="logout">Logout</a></li>
					<li><a href="contact">Help</a></li>
					
				</ul>
			</div>
			<div class="product_list_header">  
				<button class="w3view-cart1" name="submit" value="" data-toggle="modal" data-target="#cart"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></button>
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
<script>
var walbal=<?=$this->session->userdata('ewallet');?>;
function returnTotal()
{
	var sum=0;
	$(".sbtotal").each(function(){
		sum+=parseFloat($(this).val());
	});
	return sum;
}
function minus(a,price)
{
	var p=parseFloat(price).toFixed(2);
	$('.'+a).val($('.'+a).val() - 1);
	if($('.'+a).val() <1)
	{$('.'+a).val(1);}
	$(".p_"+a).val(parseFloat(p*parseFloat($('.'+a).val())).toFixed(2));
	$(this).on("click",function(event){
		event.preventDefault();
	});
}
function plus(a,price)
{
	var p=parseFloat(price).toFixed(2);
	var inp=parseInt($('.'+a).val());

	$('.'+a).val(inp+1);
	if($('.'+a).val() >99)
		{$('.'+a).val(99);}
	$(".p_"+a).val(parseFloat(p*parseFloat($('.'+a).val())).toFixed(2));
	$(this).on("click",function(event){
		event.preventDefault();
	});

}
function bbb()
{
	$("#formla").find("input").removeAttr("disabled");
	$("#formla").unbind('submit').submit();
}
function del(a)
{
	$("#"+a).remove();
	$(this).on("click",function(event){
		event.preventDefault();
	});
	counter--;
	if(counter==0)
	{
		$("#first").remove();
		$("#payBtn").attr("disabled","disabled");
		$('#alert').show();
		$('#alert2').hide();
	}
}
</script>
	<script>//shopping cart script 
	var counter		= 0;
$(function(){
	$('#alert2').hide();
	$('.addtocart').on("click",function(){
		$('#alert').hide();
		$('#alert2').show();
		$('#payBtn').removeAttr('disabled');
		var price0 = $(this).prev();
		var price = parseFloat($(price0).val());
		var name0 = $(price0).prev();
		var name = $(name0).val();
		var id0 = $(name0).prev();
		var id = $(id0).val();
		
		if(counter == 0)
		{
			var ncounter	 = parseInt(counter+1);
			var string1 = "<tr id='first'><th>Product Number</th><th>Product Name</th><th>Product Price</th><th>Product Quantity</th><th>Total Price</th><th>Delete</th></tr><tr id='"+id+"' row='"+counter+"'><td><span>"+ncounter+"</span><input type='hidden' name='cartID_"+counter+"' value='"+id+"' disabled/></td><td><input type='text' name='cartName_"+counter+"' value='"+name+"' disabled/></td><td><input type='text' name='cartPrice_"+counter+"' value='"+price+"' id='price_"+id+"' disabled/></td><td><input  class='cartrow_"+id+"' type='number' step='1' name='cartQty_"+counter+"' value='1' id='qty_"+id+"' min='0' disabled style='width:50%;'/><button class='plusminus minus' onclick=\"minus('cartrow_"+id+"',"+price+");\">-</button> <button class='plusminus plus' onclick=\"plus('cartrow_"+id+"',"+price+");\">+</button></td><td><input class='sbtotal p_cartrow_"+id+"' type='text' name='cartTot_"+counter+"' value='"+price+"' id='tot_"+id+"' disabled/></td><td><button class='delbtn' onclick='del("+id+");'>X</button></td></tr>";
			$("#shoppingcarttable").append(string1);
			counter++;
		}
		else
		{
			var same 	= false;
			for(var i =0;i<counter;i++)
			{
				var id2 = $("[row='"+i+"']").attr('id');
				if(id==id2)
				{
					same = true;
					var qty  = parseInt($('#qty_'+id).val());
					var tot  = parseFloat($('#tot_'+id).val());
					tot		 = (tot+price).toFixed(2);
					qty++;
					$('#qty_'+id).val(qty);
					$('#tot_'+id).val(tot);
				}
			}
			if(!same)
			{
				var ncounter	 = parseInt(counter+1);
				var string1 = "<tr id='"+id+"' row='"+counter+"'><td><span>"+ncounter+"</span><input type='hidden' name='cartID_"+counter+"' value='"+id+"' disabled/></td><td><input type='text' name='cartName_"+counter+"' value='"+name+"' disabled/></td><td><input type='text' name='cartPrice_"+counter+"' value='"+price+"' id='price_"+id+"' disabled/></td><td><input  class='cartrow_"+id+"' type='number' step='1' name='cartQty_"+counter+"' value='1' id='qty_"+id+"' min='0' disabled style='width:50%;'/><button class='plusminus minus' onclick=\"minus('cartrow_"+id+"',"+price+");\">-</button> <button class='plusminus plus' onclick=\"plus('cartrow_"+id+"',"+price+");\">+</button></td><td><input class='sbtotal p_cartrow_"+id+"' type='text' name='cartTot_"+counter+"' value='"+price+"' id='tot_"+id+"' disabled/></td><td><button class='delbtn' onclick='del("+id+");'>X</button></td></tr>";
				$("#shoppingcarttable").append(string1);
				counter++;
			}
		}
		$('#inCt').val(counter);
		
	});
});
</script>
<style>
#shoppingcarttable td
{
	max-width:150px;
}
#shoppingcarttable th
{
	max-width:150px;
	text-align:center;
}
#shoppingcarttable input
{
	max-width:150px;
}
.plusminus
{
	padding:0px 10px;background:lightgray;
}
.plusminus :hover
{
	background:rgba(0,0,0,0.7);color:white;
}
.plusminus :focus
{
	background:black;
}
</style>
	<div class="modal fade" id="cart" role="dialog">
	<div class="modal-dialog">
      <!-- Modal content-->
    <div class="modal-content">
	<form id="formla" action="checkout" method='post'>
	<input type='hidden' value='0' name='hidCt' id='inCt'>
        <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h4 class="modal-title">Shopping Cart</h4>
		</div>
		<div class="modal-body">
			<table id="shoppingcarttable" border='1'>
				
			</table>
		</div>
		<div class="modal-footer">
		<label id='alert2'>The product quantity can be changed later on the checkout page.</label>
		<label id='alert'>You need to have at least 1 items on your cart before proceed to payment.</label>
			<input type='submit' value='Pay Now' onclick="bbb();" class="btn btn-default" id='payBtn' disabled />
			<button type="button" class="btn btn-default" data-dismiss="modal">Close	</button>
		</div>
	</form>
	</div>
	</div>
	</div>
<!-- //header -->