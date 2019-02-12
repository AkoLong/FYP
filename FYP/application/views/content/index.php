
	<!-- main-slider -->
		<ul id="demo1">
			<li>
				<img src="<?=base_url();?>images/11.jpg" alt="" />
				<!--Slider Description example-->
				<div class="slide-desc">
					<h3><a href='suggest'><button>Suggest Me</button></a></h3>
				</div>
			</li>
			<li>
				<img src="<?=base_url();?>images/22.jpg" alt="" />
				  <div class="slide-desc">
					<h3><a href='suggest'><button>Suggest Me</button></a></h3>
				</div>
			</li>
			
			<li>
				<img src="<?=base_url();?>images/44.jpg" alt="" />
				<div class="slide-desc">
					<h3><a href='suggest'><button>Suggest Me</button></a></h3>
				</div>
			</li>
		</ul>
	<!-- //main-slider -->
	<!-- Carousel
    ================================================== -->
   
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner role="listbox" style=" width:100%; height: 500px !important;">
    <div class="item active">
      <img class="img-responsive center-block" src="<?=base_url();?>images/nasilemak.jpg" >
    </div>

    <div class="item ">
      <img class="img-responsive center-block" src="<?=base_url();?>images/lontong.jpg">
    </div>

    <div class="item">
      <img class="img-responsive center-block" src="<?=base_url();?>images/chicken.jpg">
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div><!-- /.carousel -->	
<div>
    	&nbsp;
    </div>
    <div>
    	&nbsp;
    </div>	
<!--banner-bottom-->
				
<!--Pop-->
<!--brands-->
<style>
	.col-md-2
	{	height:100px;	}
	.epp a
	{	
		white-space: nowrap; 
		overflow: hidden;
		text-overflow: ellipsis;
	}
</style>
	<div class="brands">
		<div class="container">
		<h3>Restaurants</h3>
		<br>
		<?php
		for($i=0;$i<18;$i++)
		{
			$z 	= intval($i/6);
			$z 	= $z?"-".$z:"";
			echo "
			<div class='brand-agile{$z}'>
			<div class='col-md-2 w3layouts-brand'>
			<div class='brands-w3l'>
			";
			if(isset($records[$i]))
			{
				$link	= "restaurant?id=".$records[$i]['restaurant_id'];
				$name 	= $records[$i]['restaurant_name'];
				echo "<p class='epp'><a href='{$link}' style='color:#4B0082;' title='".strtoupper($name)."'>{$name}</a></p>";
			}
			else
			{
				echo "<p><a href='#'>SOON</a></p>";
			}
			echo "
			</div>
			</div>
			</div>
			";
		}
		?>
			<!--div class="brands-agile">
				<div class="col-md-2 w3layouts-brand">
					<div class="brands-w3l">
						<p><a href="#" style="color:#4B0082;">JAMEK</a></p>
					</div>
				</div>
				<div class="col-md-2 w3layouts-brand">
					<div class="brands-w3l">
						<p><a href="#">Soon</a></p>
					</div>
				</div>
				<div class="col-md-2 w3layouts-brand">
					<div class="brands-w3l">
						<p><a href="#">Soon</a></p>
					</div>
				</div>
				
				<div class="col-md-2 w3layouts-brand">
					<div class="brands-w3l">
						<p><a href="#">Soon</a></p>
					</div>
				</div>
				<div class="col-md-2 w3layouts-brand">
					<div class="brands-w3l">
						<p><a href="#">Soon</a></p>
					</div>
				</div>
				<div class="col-md-2 w3layouts-brand">
					<div class="brands-w3l">
						<p><a href="#">Soon</a></p>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="brands-agile-1">
				<div class="col-md-2 w3layouts-brand">
					<div class="brands-w3l">
						<p><a href="#" style="color:#4B0082;">Face to Face Noodle</a></p>
					</div>
				</div>
				<div class="col-md-2 w3layouts-brand">
					<div class="brands-w3l">
						<p><a href="#">Soon</a></p>
					</div>
				</div>
				<div class="col-md-2 w3layouts-brand">
					<div class="brands-w3l">
						<p><a href="#">Soon</a></p>
					</div>
				</div>
				
				<div class="col-md-2 w3layouts-brand">
					<div class="brands-w3l">
						<p><a href="#">Soon</a></p>
					</div>
				</div>
				<div class="col-md-2 w3layouts-brand">
					<div class="brands-w3l">
						<p><a href="#">Soon</a></p>
					</div>
				</div>
				<div class="col-md-2 w3layouts-brand">
					<div class="brands-w3l">
						<p><a href="#">Soon</a></p>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="brands-agile-2">
				<div class="col-md-2 w3layouts-brand">
					<div class="brands-w3l">
						<p><a href="#" style="color:#4B0082;">FCM Cafe</a></p>
					</div>
				</div>
				<div class="col-md-2 w3layouts-brand">
					<div class="brands-w3l">
						<p><a href="#">Soon</a></p>
					</div>
				</div>
				<div class="col-md-2 w3layouts-brand">
					<div class="brands-w3l">
						<p><a href="#">Soon</a></p>
					</div>
				</div>
				
				<div class="col-md-2 w3layouts-brand">
					<div class="brands-w3l">
						<p><a href="#">Soon</a></p>
					</div>
				</div>
				<div class="col-md-2 w3layouts-brand">
					<div class="brands-w3l">
						<p><a href="#" >Soon</a></p>
					</div>
				</div>
				<div class="col-md-2 w3layouts-brand">
					<div class="brands-w3l">
						<p><a href="#">Soon</a></p>
					</div>
				</div>
				<div class="clearfix"></div>
			</div-->
		</div>
	</div>	
	<!-- Trigger the modal with a button -->
<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" style="float: right;">Click here to Rate Us! - FoodPeazy</button>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Please Rate Our Services</h4>
      </div>
      <div class="modal-body">
        <p>Hello! We(FoodPeazy) want to hear from you!<br> If you like our services, please give us a 5-Star Rating</p>
        <h1>Rate Me Now! </h1>
		<fieldset class="rating">
		    <input type="radio" id="star5" name="rating" value="5" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
		    <input type="radio" id="star4half" name="rating" value="4 and a half" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
		    <input type="radio" id="star4" name="rating" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
		    <input type="radio" id="star3half" name="rating" value="3 and a half" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
		    <input type="radio" id="star3" name="rating" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
		    <input type="radio" id="star2half" name="rating" value="2 and a half" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
		    <input type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
		    <input type="radio" id="star1half" name="rating" value="1 and a half" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
		    <input type="radio" id="star1" name="rating" value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
		    <input type="radio" id="starhalf" name="rating" value="half" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
	 <div>
    	&nbsp;
    	    	&nbsp;

    </div>
		</fieldset>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" onclick = "alert('Thank You for your rating!')">Submit</button>
      </div>
    </div>

  </div>
</div>
<!-- //new -->
