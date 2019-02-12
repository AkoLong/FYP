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
}
</style>

<script>
	$(function(){
		var table	= "<?=isset($table)?$table:null?>";
		$('.clearfix').find('#regtab_order').addClass("targetted");
		$('#recordtable').DataTable({
			'ordering':false,
		});
	});
</script>
<div class="top-brands">
<div class="container"> 
<h2><?=isset($tableTitle)?$tableTitle:"Record Table"?></h2>
<div id="regtab">
	<div class="clearfix">
	  	<?php
		if(isset($tableName))
			foreach($tableName as $num	=> $name)
				echo "<a class='regtablink' id='regtab_{$name}' href='record?table={$name}'>{$name}</a>";
		else
			echo "<h2>No Table Found.</h2>"
		?>
	</div>
</div>
<?php
echo "<div style='overflow-x:auto;'>
<table border=1>
<tr>
<th>Order Number</th>
<th>Restaurant Name</th>
<th>Customer Name</th>
<th>Grand Total</th>
<th>Payment Method</th>
<th>Delivery Fee</th>
<th>Delivery Address</th>
<th>Order Status</th>
<th>Order Status Remark</th>
<th>Order Created Time</th>
<th>Order Closed Time</th>
<th>Accept Order</th>
<th>Decline Order</th>
<th>Cancel Order</th>
<th>Delete Order</th>
<th>Product Name</th>
<th>Product Preview</th>
<th>Product Description</th>
<th>Product Type</th>
<th>Product Price</th>
<th>Product Quantity</th>
<th>Product Total Price</th>
</tr>
";
foreach($records as $num => $detail)
{
	$x = $num+1;
	$orderdetail 		= $detail['order_detail'];
	$productdetail 		= $detail['product_detail'];
	if($orderdetail['order_closed_date']	= '0000-00-00 00:00:00')
		$orderdetail['order_closed_date']	= '-';
	echo "<tr>";
	echo "<td rowspan='".$orderdetail['order_product_type_amount']."'>{$x}</td>";
	echo "<td rowspan='".$orderdetail['order_product_type_amount']."'>".$orderdetail['restaurant_name']."</td>";
	echo "<td rowspan='".$orderdetail['order_product_type_amount']."'>".$orderdetail['customer_name']."</td>";
	echo "<td rowspan='".$orderdetail['order_product_type_amount']."'>".$orderdetail['order_grand_total']."</td>";
	echo "<td rowspan='".$orderdetail['order_product_type_amount']."'>".$orderdetail['order_payment_method']."</td>";
	echo "<td rowspan='".$orderdetail['order_product_type_amount']."'>".$orderdetail['order_delivery_fee']."</td>";
	echo "<td rowspan='".$orderdetail['order_product_type_amount']."'>".$orderdetail['order_delivery_address']."</td>";
	echo "<td rowspan='".$orderdetail['order_product_type_amount']."'>".$orderdetail['order_status']."</td>";
	echo "<td rowspan='".$orderdetail['order_product_type_amount']."'>".$orderdetail['order_status_remark']."</td>";
	echo "<td rowspan='".$orderdetail['order_product_type_amount']."'>".$orderdetail['order_created_date']."</td>";
	echo "<td rowspan='".$orderdetail['order_product_type_amount']."'>".$orderdetail['order_closed_date']."</td>";
	echo "<td rowspan='".$orderdetail['order_product_type_amount']."'>";
	if($orderdetail['order_status']=='pending')
		echo "<a href='adminAcceptOrder?id=".$orderdetail['order_id']."' >Accept this order</a>";
	else
		echo "You can only accept the order when it have not been processed.";
	echo "</td>";
	echo "<td rowspan='".$orderdetail['order_product_type_amount']."'>";
	if($orderdetail['order_status']=='pending'||$orderdetail['order_status']=='processing')
		echo "<a href='adminDeclineOrder?id=".$orderdetail['order_id']."' >Decline this order</a>";
	else
		echo "You can only decline the order when it have not been closed.";
	echo "</td>";
	echo "<td rowspan='".$orderdetail['order_product_type_amount']."'>";
	if($orderdetail['order_status']=='pending'||$orderdetail['order_status']=='processing')
		echo "<a href='adminCancelOrder?id=".$orderdetail['order_id']."' >Cancel this order</a>";
	else
		echo "You can only cancel the order when it have not been closed.";
	echo "</td>";
	echo "<td rowspan='".$orderdetail['order_product_type_amount']."'>";
	echo "<a href='adminDeleteOrder?id=".$orderdetail['order_id']."' >Delete this order</a>";
	echo "</td>";
	foreach($productdetail as $num => $prodrecord)
	{
		echo $num==0?null:"<tr>";
		echo "<td>".$prodrecord['product_name']."</td>";
		echo "<td><img class='img-responsive' src='".base_url().$prodrecord['product_image_path']."' /></td>";
		echo "<td>".$prodrecord['product_description']."</td>";
		echo "<td>".$prodrecord['product_type']."</td>";
		echo "<td>".$prodrecord['product_discounted_price']."</td>";
		echo "<td>".$prodrecord['productorder_quantity']."</td>";
		echo "<td>".$prodrecord['productorder_totprice']."</td>";
		echo $num==count($productdetail)-1?null:"</tr>";
	}
	echo "</tr>";
}
echo "</table></div>";
?>
</div>
</div>
<style>
table {
    border-collapse: collapse;
    border-spacing: 0;
    width: 100%;
    border: 1px solid #ddd;
}

th, td {
    border: none;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}
</style>