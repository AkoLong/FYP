<link href="<?=base_url()?>css/responsive.dataTables.min.css" rel="stylesheet" type="text/css" media="all">
<link href="<?=base_url()?>css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" media="all">
<!--script src="<?=base_url();?>js/jquery-1.11.3.min.js"></script-->
<script src="<?=base_url();?>js/jquery.dataTables.min.js"></script>
<script src="<?=base_url();?>js/dataTables.responsive.min.js"></script>

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
		$('#recordtable').DataTable({
			'ordering':false,
		});
	});
</script>

<div class="top-brands">
<div class="container">
<h2>Top Up History</h2>
<?php 
if($records)
{
	$attribute	= array_keys($records[0]);
	?>
	<table id="recordtable" class="display responsive nowrap" cellspacing="10" width="100%">
	<thead width="100%">
	<tr>
	<?php
	foreach($attribute as $num	=> $attr)
		echo "<th>{$attr}</th>";
	?>
	</tr>
	</thead>
	<tbody>
	<?php
		foreach($records as $num	=> $record)
		{	
			echo "<tr>";
			foreach($record as $attr 	=> $value)
			echo $attr!=$pk?"<td>{$value}</td>":"<td>".($num+1)."</td>";
			echo "</tr>";
		}
	?>
	</tbody>
</table>
<?php
}
else
	echo "<h2>No Results Found.</h2>";
?>
</div>
</div>