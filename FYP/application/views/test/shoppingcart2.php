<?php
$this->load->view('template/linktop');
$this->load->view('template/scriptbot');
?>
<style>
@media (max-width: @screen-xs-min) {
  .modal-xs { width: @modal-sm; }
}
</style>
<script>
$(function(){
	$('.hidden').hide();
	var counter = $('#shopping_cart').find('#ct').val();
	$('.addtocart').on("click",function(){
		var price1 = $(this).prev();
		var price = parseFloat($(price1).html());
		var name1 = $(price1).prev();
		var name = $(name1).html();
		var img1 = $(name1).prev();
		var img = $(img1).html();
		var id1 = $(img1).prev();
		var id = $(id1).html();
		var string1 = "<input type='text' name='id' value ='"+id+"' disabled='true'/><input type='text' value ='"+img+"' disabled='true'/><input type='text' value ='"+name+"' disabled='true'/><input type='text' value ='"+price+"' disabled='true'/>";
		$("#shopping_cart").append(string1);
		counter++;
	});
});
</script>
<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>
<div class="modal fade" id="myModal" role="dialog">
<div class="modal-dialog">
      <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h4 class="modal-title">Shopping Cart</h4>
			</div>
			<div class="modal-body">
			<form name="shopping_cart" id="shopping_cart">
			<input id='ct' value ='0' type='hidden'/>
			</form>
			</div>
			<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Close	</button>
			</div>
	</div>
</div>
</div>
<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Shopping Cart</button>
<div class="product">
<span class="id hidden">0551255</span>
<span class="img hidden">404 not found</span>
<span class="name hidden">Butter Fish</span>
<span class="price hidden">8.00</span>
<button class="addtocart">Butter Fish</button>
</div>
<div class="product">
<span class="id hidden">5153544</span>
<span class="img hidden">404 not found</span>
<span class="name hidden">Butter Chicken</span>
<span class="price hidden">6.00</span>
<button class="addtocart">Butter Chicken</button>
</div>
<div class="product">
<span class="id hidden">15315135</span>
<span class="img hidden">404 not found</span>
<span class="name hidden">Nasi Goreng Biasa</span>
<span class="price hidden">5.00</span>
<button class="addtocart">Nasi Goreng Biasa</button>
</div>
<a href='test1'>Page 1</a>
<a href='test2'>Page 2</a>