<link href="<?=base_url()?>css/responsive.dataTables.min.css" rel="stylesheet" type="text/css" media="all">
<link href="<?=base_url()?>css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" media="all">
<!--script src="<?=base_url();?>js/jquery-1.11.3.min.js"></script-->
<script src="<?=base_url();?>js/jquery.dataTables.min.js"></script>
<script src="<?=base_url();?>js/dataTables.responsive.min.js"></script>

<style>
table tr img
{
	width:80px;
	height:80px;
}
</style>
<script>
	$(document).ready(function() {
    $('#example').DataTable({'ordering':false});
} );
</script>

<div class="top-brands">
	<div class="container">
		<h2>Restaurants</h2>
		<br><br>
		<table id="example" class="display responsive nowrap" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Restaurant Image</th>
                <th>Restaurant Name</th>
                <th>Restaurant Rating</th>
                <th>Estimated Delivery Time</th>
				<th></th>
            </tr>
        </thead>
 
        <tbody>
            <?php
			foreach($records as $num => $record)
			{
				echo "<tr>
				<td><img src = '".base_url().$record['restaurant_image_path'].".'/></td>
				<td>".$record['restaurant_name']."</td>
				<td>".$record['restaurant_rating']."</td>
				<td>".$record['restaurant_deliver_time']."</td>
				<td><a href='restaurant?id=".$record['restaurant_id']."'>GO NOW</a></td>
				</tr>";
			}
			?>
        </tbody>
    </table>
	</div>
</div>