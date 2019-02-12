<style>
.viewtable
{
	font-size:1.1em;
	border-spacing:10px;
	border-collapse: separate;
}
</style>
<div class="register">
<div class="container">
<div class="login-form-grids">
<div class="cusdiv"> <!-- Owner view Div -->
	<h3 style="text-align:center;font-size:1.8em;">Profile Information</h3><br /><br><hr>
	<table class="viewtable">
		<tr>
			<td width="200px"><label>Name </label></td>
			<td><span><?=$record?$record['customer_name']:null?></span><br /></td>
		</tr>
		<tr>
			<td><label>Gender </label></td>
			<td><span><?=$record?$record['customer_gender']:null?></span></td>
		</tr>
		<tr>
			<td><label>Date of birth </label></td>
			<td><span><?=$record?$record['customer_birth']:null?></span></td>
		</tr>
		<tr>
			<td><label>Contact Number </label></td>
			<td><span><?=$record?$record['customer_contact']:null?></span></td>
		</tr>
		<tr>
			<td><label>Address  </label></td>
			<td><span><?=$record?$record['customer_address']:null?></span></td>
		</tr>
		<tr>
			<td><label>State  </label></td>
			<td><span><?=$record?$record['customer_state']:null?></span></td>
		</tr>
		<tr>
			<td><label>Zip Code  </label></td>
			<td><span><?=$record?$record['customer_zip']:null?></span></td>
		</tr>
		<tr>
			<td><label>E-Wallet Balance  </label></td>
			<td><span>RM <?=$record?$record['customer_balance']:null?></span></td>
		</tr>
	</table>
	<hr>
	<a href='customerForm'>Edit Your Profile</a>
</div>
</div>
</div>
</div>