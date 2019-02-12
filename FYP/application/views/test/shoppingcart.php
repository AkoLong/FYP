<?php
$this->load->view('template/linktop');
$this->load->view('template/scriptbot');
?>
<div class="container">
<h2>Modal Example</h2>
<!-- Trigger the modal with a button -->
<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>

<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
<div class="modal-dialog">
      <!-- Modal content-->
    <div class="modal-content">
	<form>
        <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h4 class="modal-title">Shopping Cart</h4>
			</div>
			<div class="modal-body">
			<?php
			if($this->session->userdata('cartItem'))
			{
				$cartItem	= $this->session->userdata('cartItem');
				$th 		= ['Product ID','Product Image','Product Name','Product Price','Add Product Quantity','Product Quantity','Subtract Product Quantity','Total Price','Delete Product'];
				echo "<table>";
				echo "<tr>";
				foreach($th as $num => $attribute)
					echo "<th>{$attribute}</th>";
				echo "</tr>";
				foreach($cartItem as $id => $product)
				{
					echo "<tr>";
					echo "<td>{$id}</td>";
					foreach($product as $attribute	=> $value)
						echo "<td>{$value}</td>";
					echo "</tr>";
				}
				echo "</table>";
			}
			else
			{
				echo "HEY!!!! WHY DONT YOU BUY ANYTHING ??!!?!?!?!";
			}
			?>
			</div>
			<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Close	</button>
		</div>
	</form>
	</div>
</div>
</div>

</div>
<form action="addToCart">
<input type="hidden" value="01" name="id"/>
<input type="hidden" value="404NOTFOUND" name="img"/>
<input type="hidden" value="qeteqt" name="name"/>
<input type="hidden" value="513.50" name="price"/>
<input type="submit" value="PRODUCT000"/>
</form>
<form action="addToCart">
<input type="hidden" value="03111" name="id"/>
<input type="hidden" value="404OTFOUND" name="img"/>
<input type="hidden" value="qeteqt" name="name"/>
<input type="hidden" value="55454.50" name="price"/>
<input type="submit" value="PRODUCT001"/>
</form>
<form action="addToCart">
<input type="hidden" value="42" name="id"/>
<input type="hidden" value="eqteqt" name="img"/>
<input type="hidden" value="mdzz" name="name"/>
<input type="hidden" value="513.50" name="price"/>
<input type="submit" value="PRODUCT002"/>
</form>
<form action="addToCart">
<input type="hidden" value="135" name="id"/>
<input type="hidden" value="404NOTFOqetUND" name="img"/>
<input type="hidden" value="cibai" name="name"/>
<input type="hidden" value="135.80" name="price"/>
<input type="submit" value="PRODUCT003"/>
</form>
<form action="addToCart">
<input type="hidden" value="46" name="id"/>
<input type="hidden" value="404NOTFOUND" name="img"/>
<input type="hidden" value="sohai" name="name"/>
<input type="hidden" value="0.10" name="price"/>
<input type="submit" value="PRODUCT004"/>
</form>
<form action="addToCart">
<input type="hidden" value="313" name="id"/>
<input type="hidden" value="404NOTFOUND" name="img"/>
<input type="hidden" value="diuniabu" name="name"/>
<input type="hidden" value="85.50" name="price"/>
<input type="submit" value="PRODUCT005"/>
</form>
<a href="pay">PAY</a>
