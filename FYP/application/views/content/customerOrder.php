<?php
echo "<div style='overflow-x:auto;'>
<table border=1>
<tr>
<th>Order Number</th>
<th>Restaurant Name</th>
<th>Grand Total</th>
<th>Payment Method</th>
<th>Delivery Fee</th>
<th>Delivery Address</th>
<th>Order Status</th>
<th>Order Status Remark</th>
<th>Order Created Time</th>
<th>Order Closed Time</th>
<th>Cancel Order</th>
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
		echo "<a href='cancelOrder?id=".$orderdetail['order_id']."' >Cancel this order</a>";
	else
		echo "You can only cancel the order when it have not been processed.";
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