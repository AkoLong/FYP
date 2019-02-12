<!-- help-page -->
	<div class="faq-w3agile">
		<div class="container"> 
			<h2 class="w3_agile_header">Frequently asked questions(FAQ)</h2> 
			<ul class="faq">
				<li class="item1"><a href="#" title="click here">What is FoodPeazy?</a>
					<ul>
						<li class="subitem1"><p> FoodPeazy provides customers with an easy and secure way to order from the best takeaways in their area.</p></li>										
					</ul>
				</li>
				<li class="item2"><a href="#" title="click here">What are your payment methods?</a>
					<ul>
						<li class="subitem1"><p>We accept cash on delivery and also online payments for selected restaurants. Soon we will have online payments for all restaurants.</p></li>										
					</ul>
				</li>
				<li class="item3"><a href="#" title="click here">How does Foodpanda work?</a>
					<ul>
						<li class="subitem1"><p>Enter your postcode, choose which restaurants near you that you want to order from and click away! You can view all the restaurants in your area or select your favourite cuisine. Once you have placed your order and choose your method of payment, FoodPeazy will do the rest of the work for you!</p></li>										
					</ul>
				</li>
				<li class="item4"><a href="#" title="click here">Can I call you to arrange catering?</a>
					<ul>
						<li class="subitem1"><p>FoodPeazy is only responsible for forwarding the orders to the restaurants and is not responsible for catering services. However we will do all we can to help you; we can contact the takeaway on your behalf.</p></li>										
					</ul>
				</li> 
				<li class="item5"><a href="#" title="click here">What kind of restaurant do you have under your services?</a>
					<ul>
						<li class="subitem1"><p>We have a wide variety of culinary selections you will be spoilt for choice. We have 5 restaurants on FoodPeazy's list (and growing fast!). You can choose from Chinese, Indian, Italian, Thai, Greek, Bangladeshi, Turkish, French and many more.</p></li>										
					</ul>
				</li>
				<li class="item6"><a href="#" title="click here">Are waiters, cutleries and burner provided for catering?</a>
					<ul>
						<li class="subitem1"><p>FoodPeazy is only responsible for forwarding the orders to the restaurants and is not responsible for catering services. However we will do all we can to help you; we can contact the takeaway on your behalf. If you put a note regarding cutlery in the comment box when you check out, we will let the restaurant know that you need cutlery.</p></li>										
					</ul>
				</li>
				<li class="item7"><a href="#" title="click here">How long will the delivery take?</a>
					<ul>
						<li class="subitem1"><p>Depends on the number of orders and the distance from the restaurant to your delivery address. Once your order has been processed, we will send you a reach out to you regarding your confirmation and expected delivery time.</p></li>										
					</ul>
				</li>
				<li class="item8"><a href="#" title="click here">What if I'm not at home when the delivery man comes by? Will they redeliver?</a>
					<ul>
						<li class="subitem1"><p>You will receive a confirmation email from us, stating the delivery time of your order so you will be able to arrange for someone to be home when the delivery man comes by. Unfortunately, redelivery is not possible.</p></li>										
					</ul>
				</li>
				<li class="item9"><a href="#" title="click here">How do I provide feedback?</a>
					<ul>
						<li class="subitem1"><p>You can contact us via chat on our app/website or email us</p></li>										
					</ul>
				</li>
				<li class="item10"><a href="#" title="click here">If the delivery is late, do I get some discount?</a>
					<ul>
						<li class="subitem1"><p>FoodPeazy is only responsible for forwarding the orders to the restaurants and has no control over the actual delivery. However we will do all we can to help you; you can contact us and we can contact the takeaway on your behalf as soon as possible to investigate. Give us a call or drop us a line and we will try to help you out.</p></li>										
					</ul>
				</li> 
			</ul> 
			<!-- script for tabs -->
			<script type="text/javascript">
				$(function() {
				
					var menu_ul = $('.faq > li > ul'),
						   menu_a  = $('.faq > li > a');
					
					menu_ul.hide();
				
					menu_a.click(function(e) {
						e.preventDefault();
						if(!$(this).hasClass('active')) {
							menu_a.removeClass('active');
							menu_ul.filter(':visible').slideUp('normal');
							$(this).addClass('active').next().stop(true,true).slideDown('normal');
						} else {
							$(this).removeClass('active');
							$(this).next().stop(true,true).slideUp('normal');
						}
					});
				
				});
			</script>
			<!-- script for tabs -->   
		</div>
	</div>