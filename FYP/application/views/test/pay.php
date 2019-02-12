<?php/*
$this->load->view('template/linktop');
$this->load->view('template/scriptbot');
?>
<?php
if($cartItem)
{
	$th 		= ['Product ID','Product Image','Product Name','Product Price','Product Quantity','Total Price'];
	echo "<table>";
	echo "<tr>";
	foreach($th as $num => $attribute)
		echo "<th>{$attribute}</th>";
	echo "</tr>";
	foreach($cartItem as $num => $product)
	{
		echo "<tr><td>{$num}</td>";
		foreach($product as $attribute => $value)
			echo "<td id='{$attribute}_{$num}'>{$value}</td>";
		echo "</tr>";
	}
	echo "</table>";
	echo "SUM = RM <span id='sum'>{$total}</span>";
	echo "<a href='paid'>PaY</a>";
}

?>