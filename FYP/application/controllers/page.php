<?php
class page extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->library(['session','form_validation','encrypt']);
		$this->load->helper(['url', 'form']);
		$model		=
		[
			'customer_mod'			=> 'customer',
			'owner_mod'				=> 'owner',
			'restaurant_mod'		=> 'restaurant',
			'admin_mod'				=> 'admin',
			'product_mod'			=> 'product',
			'order_mod'				=> 'order',
			'productorder_mod'		=> 'productorder',
			'topup_mod'				=> 'topup',
			'redeem_mod'			=> 'redeem',
			'review_mod'			=> 'review',
		];
		$this->load->database();
		$this->load->model($model);
		date_default_timezone_set('Asia/Kuala_Lumpur');
		if(!$this->session->userdata('id'))
			$this->session->set_userdata('identity','unregistered');
		else
		{
			if($this->session->userdata('identity')=='customer')
			{
				$detail 			= $this->getDetail("customer",$this->session->userdata('id'));
				$thing 				= ['ewallet','custname'];
				$value 				= [$detail['customer_balance'],$detail['customer_name']];
				$this->setSome($thing,$value);
			}
			elseif($this->session->userdata('identity')=='owner')
			{
				$detail 			= $this->getDetail("owner",$this->session->userdata('id'));
				$resdetail 			= $this->getRestaurantByOID($this->session->userdata('id'));
				$thing 				= ['resbal','ownname'];
				$value 				= [$resdetail['restaurant_balance'],$detail['owner_name']];
				$this->setSome($thing,$value);
			}
			else
			{
				$detail 			= $this->getDetail("admin",$this->session->userdata('id'));
				$this->setSome('adname',$detail['admin_name']);
			}
		}
	}
	
	//test function **ungrouped
	
	//Shopping Cart
	/*
	function testShoppingCart()
	{
		$this->load->view('test/shoppingcart');
	}
	
	function pay()
	{
		$cartItem	= $this->session->userdata('cartItem');
		$total 		= 0;
		foreach($cartItem as $num => $product)
		{
			unset($cartItem[$num]['add']);
			unset($cartItem[$num]['sub']);
			unset($cartItem[$num]['del']);
			$total		+= $cartItem[$num]['total'];
		}
		$data	= [];
		$data['cartItem']	= $cartItem;
		$data['total']	= $total;
		$this->load->view('test/pay',$data);
	}
	
	function paid()
	{
		$this->session->unset_userdata('cartItem');
		redirect('page/testShoppingCart');
	}
	
	function addToCart()
	{
		if($this->session->userdata('cartItem'))
		{
			$cartItem	= $this->session->userdata('cartItem');
			$id			= $this->input->get_post('id');
			if(!isset($cartItem[$id]))
			{
				$price		= floatval($this->input->get_post('price'));
				$totalPrice	= $price;
				$cartItem[$id]	= 
				[
					'img'	=> $this->input->get_post('img'),
					'name'	=> $this->input->get_post('name'),
					'price'	=> $this->input->get_post('price'),
					'add'	=> "<a href='addProduct?id={$id}'>Add</a>",
					'quantity' => 1,
					'sub'	=> "<a href='subtractProduct?id={$id}'>Sub</a>",
					'total'	=> $price,
					'del'	=>"<a href='removeProduct?id={$id}'>Remove</a>",
				];
			}
			else
			{
				$cartItem[$id]['quantity']	+= 1;
				$cartItem[$id]['total']		+= $cartItem[$id]['price'];
			}
		}
		else
		{
			$cartItem	= [];
			$cartItem[$id]	= 
			[
				'img'	=> $this->input->get_post('img'),
				'name'	=> $this->input->get_post('name'),
				'price'	=> $this->input->get_post(''),
				'add'	=> "<a href='addProduct?id={$id}'>Add</a>",
				'quantity' => 1,
				'sub'	=> "<a href='subtractProduct?id={$id}'>Sub</a>",
				'total'	=> $price,
				'del'	=>"<a href='removeProduct?id={$id}'>Remove</a>",
			];			
		}
		$this->session->set_userdata('cartItem',$cartItem);
		redirect('page/testShoppingCart');
	}
	
	function removeProduct()
	{
		$id		= $this->input->get_post('id');
		$cartItem	= $this->session->userdata('cartItem');
		unset($cartItem[$id]);
		$this->session->set_userdata('cartItem',$cartItem);
		redirect('page/testShoppingCart');
	}
	
	function addProduct()
	{
		$id		= $this->input->get_post('id');
		$cartItem	= $this->session->userdata('cartItem');
		$cartItem[$id]['quantity']	+= 1;
		$cartItem[$id]['total']		+= $cartItem[$id]['price'];
		$this->session->set_userdata('cartItem',$cartItem);
		redirect('page/testShoppingCart');
	}
	
	function subtractProduct()
	{
		$id		= $this->input->get_post('id');
		$cartItem	= $this->session->userdata('cartItem');
		$cartItem[$id]['quantity']	-= 1;
		$cartItem[$id]['total']		-= $cartItem[$id]['price'];
		if($cartItem[$id]['quantity']==0)
			unset($cartItem[$id]);
		$this->session->set_userdata('cartItem',$cartItem);
		redirect('page/testShoppingCart');
	}*/
	/*
	function testShoppingCart2()
	{
		$this->someconstr();
		$this->load->view('test/shoppingcart2');
	}
	
	function test1()
	{
		$this->someconstr();
		$this->load->view('test/test1');
	}
	
	function someconstr()
	{
		$data = $this->input->post();
		echo "<pre>";
		var_dump($data);
		echo "</pre>";
	}
	
	function test2()
	{
		$this->someconstr();
		$this->load->view('test/test2');
	}
	*/
	//Shopping Cart
	
	function login()
	{
		if($this->session->userdata('id'))
		{
			$this->setSomeMessage('You need to log out first before you log into another account. Click OK to redirect back to home page.');
			redirect('page/index');
		}
		else
		{
			$data	= [
				'identity'	=> $this->session->userdata('identity'),
				'destination'	=> __FUNCTION__
			];
			if($this->session->flashdata('error'))
			{
				$data['error']		= $this->session->flashdata('error');
				$data['retainval']	= $this->session->flashdata('retainval');
			}
			$this->load->view('template/template',$data);
		}
	}
	
	function suggest()
	{
		$records 	= $this->getList("restaurant");
		$array 	= [];
		foreach($records as $num => $attribute)
		{
			$z = $attribute['restaurant_rating']*100;
			for($i=0;$i<$z;$i++)
				$array[]	= $attribute['restaurant_id'];
		}
		shuffle($array);
		$id 	= array_shift($array);
		redirect("page/restaurant?id={$id}");
	}
	
	function logout()
	{
		$identity	= $this->session->userdata('identity');
		$this->session->unset_userdata('id');
		$login		= $identity=='admin'?'login2':'login';
		redirect("page/{$login}");
	}
	
	function p_login()
	{
		$account		= $this->input->get_post('radAccount');
		if($account=="customer")
		{
			$customer 	= new $this->customer();
			$customer->customer_email			= $this->input->get_post('txtEmail');
			$customer->customer_pass			= md5($this->input->get_post('txtPass'));
			$record 		= $customer->checkLogin();
			if(isset($record))
			{
				$this->session->set_userdata('id',$record['customer_id']);
				$this->session->set_userdata('identity','customer');
				$name 		= $record['customer_name'];
				$this->setSomeMessage("{$name}, welcome to our website.");
				redirect('page/index');
			}
			else
			{
				$this->formFail('login','Incorrect email or password.');
			}
		}
		else
		{
			$owner		= new $this->owner();
			$owner->owner_email			= $this->input->get_post('txtEmail');
			$owner->owner_pass			= md5($this->input->get_post('txtPass'));
			$record 		= $owner->checkLogin();
			if($record)
			{
				if($record['owner_status']=='approved'||$record['owner_status']=='verified')
				{
					$this->session->set_userdata('id',$record['owner_id']);
					$this->session->set_userdata('identity','owner');
					$name 		= $record['owner_name'];	
					$this->setSomeMessage($record['owner_status']=='approved'?"{$name}, welcome to our website.":"{$name}, welcome to our website. You need to complete the information at your restaurant profile page before the time given which is two weeks after your verification. For further enquiry, please refer to the email that sent to the email address provided or contact our admin.");
					redirect('page/index');
				}
				elseif($record['owner_status']=='pending')
				{
					$this->formFail('login','This account has not been verified by my admin yet, please wait until the admin send you an email to notify about this. Thank you.');
				}

				elseif($record['owner_status']=='disapproved')
				{
					$this->formFail('login','This account has been disapproved by our admin due to certain reason. For more information or enquiry, please contact our admin via email. For contact information, please visit the CONTACT US page');
				}
				elseif($record['owner_status']=='timeout')
				{
					$this->formFail('login','This account has been deactivated because the owner of this account did not complete the information required by our system within the time given. For more information or enquiry, please contact our admin via email. For contact information, please visit the CONTACT US page');
				}
			}
			else
			{
				$this->formFail('login','Incorrect email or password.');
			}
		}
	}
	
	function login2()
	{
		if($this->session->userdata('id'))
		{
			$this->setSomeMessage('You need to log out first before you log into another account. Click OK to redirect back to home page');
			redirect('page/index');
		}
		else
		{
			$data	= [
				'identity'	=> $this->session->userdata('identity'),
				'destination'	=> __FUNCTION__
			];
			if($this->session->flashdata('error'))
			{
				$data['error']		= $this->session->flashdata('error');
				$data['retainval']	= $this->session->flashdata('retainval');
			}
			$this->load->view('template/template',$data);
		}
	}
	
	function p_login2()
	{
		$admin		= new $this->admin();
		$admin->admin_email		= $this->input->get_post('txtEmail');
		$admin->admin_pass		= md5($this->input->get_post('txtPass'));
		$record		= $admin->checkLogin();
		if($record)
		{
			$this->session->set_userdata('id',$record['admin_id']);
			$this->session->set_userdata('identity','admin');
			$name 		= $record['admin_name'];
			$this->setSomeMessage("{$name}, welcome to our website.");
			redirect('page/index');
		}
		else
		{
			$this->formFail('login2','Incorrect email or password.');
		}
	}
	
	function adminCancelOrder()
	{
		$id 	= $this->input->get_post('id');
		if($this->session->userdata('identity')!='admin' || !$id)
		{
			$this->setSomeMessage("Invalid URL");
			$this->redirect('page/index');
		}
		else
		{
			$recordAdmin 		= $this->getDetail("admin",$this->session->userdata('id'));
			$name 				= $recordAdmin['admin_name'];
			$order 				= new $this->order();
			$order->order_id 			= $id;
			$order->order_closed_by		= $this->session->userdata('id');
			$order->order_closed_date 	= date('Y-m-d H:i:s');
			$affected_row		= $order->adminCancel();
			if($affected_row)
			{
				redirect("page/record?table=order");
			}
			else
			{
				$this->setSomeMessage("Opps, look like something went wrong :-(");
				redirect("page/record?table=order");
			}
		}
	}
	
	function adminCompleteOrder()
	{
		$id 	= $this->input->get_post('id');
		if($this->session->userdata('identity')!='admin' || !$id)
		{
			$this->setSomeMessage("Invalid URL");
			$this->redirect('page/index');
		}
		else
		{
			$recordAdmin 		= $this->getDetail("admin",$this->session->userdata('id'));
			$name 				= $recordAdmin['admin_name'];
			$order 				= new $this->order();
			$order->order_id 			= $id;
			$order->order_closed_by		= $this->session->userdata('id');
			$order->order_closed_date 	= date('Y-m-d H:i:s');
			$affected_row		= $order->adminComplete();
			if($affected_row)
			{
				redirect("page/record?table=order");
			}
			else
			{
				$this->setSomeMessage("Opps, look like something went wrong :-(");
				redirect("page/record?table=order");
			}
		}
	}
	
	function adminDeclineOrder()
	{
		$id 	= $this->input->get_post('id');
		if($this->session->userdata('identity')!='admin' || !$id)
		{
			$this->setSomeMessage("Invalid URL");
			$this->redirect('page/index');
		}
		else
		{
			$recordAdmin 		= $this->getDetail("admin",$this->session->userdata('id'));
			$name 				= $recordAdmin['admin_name'];
			$order 				= new $this->order();
			$order->order_id 			= $id;
			$order->order_closed_by		= $this->session->userdata('id');
			$order->order_closed_date 	= date('Y-m-d H:i:s');
			$affected_row		= $order->adminDecline();
			if($affected_row)
			{
				redirect("page/record?table=order");
			}
			else
			{
				$this->setSomeMessage("Opps, look like something went wrong :-(");
				redirect("page/record?table=order");
			}
		}
	}
	
	function adminAcceptOrder()
	{
		$id 	= $this->input->get_post('id');
		if($this->session->userdata('identity')!='admin' || !$id)
		{
			$this->setSomeMessage("Invalid URL");
			$this->redirect('page/index');
		}
		else
		{
			$recordAdmin 		= $this->getDetail("admin",$this->session->userdata('id'));
			$name 				= $recordAdmin['admin_name'];
			$order 				= new $this->order();
			$order->order_id 			= $id;
			$order->order_updated_by	= $this->session->userdata('id');
			$order->order_updated_date 	= date('Y-m-d H:i:s');
			$affected_row		= $order->adminAccept();
			if($affected_row)
			{
				redirect("page/record?table=order");
			}
			else
			{
				$this->setSomeMessage("Opps, look like something went wrong :-(");
				redirect("page/record?table=order");
			}
		}
	}
	
	function adminDeleteOrder()
	{
		$id 	= $this->input->get_post('id');
		if($this->session->userdata('identity')!='admin' || !$id)
		{
			$this->setSomeMessage("Invalid URL");
			$this->redirect('page/index');
		}
		else
		{
			$order 				= new $this->order();
			$order->order_id 	= $id;
			$affected_row		= $order->remove();
			if($affected_row)
			{
				$productorder	= new $this->productorder();
				$productorder->productorder_order_id	= $id;
				$affected_row2 	= $productorder->remove();
				if($affected_row2)
					redirect("page/record?table=order");
				else
				{
					$this->setSomeMessage("Opps, look like something went wrong :-(");
					redirect("page/record?table=order");
				}
			}
			else
			{
				$this->setSomeMessage("Opps, look like something went wrong :-(");
				redirect("page/record?table=order");
			}
		}
	}
	
	function orderTable()
	{
		$data	= [
			'identity'	=> $this->session->userdata('identity'),
			'destination'	=> __FUNCTION__ ,
			'tableName'	=>['owner','restaurant','customer','product','topup','redeem','order','review']
		];
		$order 			= new $this->order();
		$order->order_created_by 		= $this->session->userdata('id');
		$recordsOrder 					= $order->getListByCID();
		$groupedArray					= [];
		if($recordsOrder)
		{
			foreach($recordsOrder as $num	=> $attrarray)
			{
				$groupedArray[$num]['order_detail']		= $attrarray;
				$oid 			= $attrarray['order_id'];
				$cid 			= $attrarray['order_created_by'];
				$recordCust		= $this->getDetail("customer",$cid);
				$rid 			= $attrarray['order_restaurant_id'];
				$recordres		= $this->getDetail("restaurant",$rid);
				$groupedArray[$num]['order_detail']['restaurant_name']	= $recordres['restaurant_name'];
				$groupedArray[$num]['order_detail']['customer_name']	= $recordCust['customer_name'];
				$productorder 	= new $this->productorder();
				$productorder->productorder_order_id		= $oid;
				$recordsProdOr	= $productorder->getListByOID();
				foreach($recordsProdOr as $num2 => $record)
				{
					$recordProduct 		= $this->getDetail("product",$record['productorder_product_id']);
					if(!is_array($recordProduct))
					{
						$groupedArray[$num]['product_detail'][$num2]	= $recordsProdOr[$num2];
						$did		= $record['productorder_product_id'];
						$groupedArray[$num]['product_detail'][$num2]['product_id']	=	"product has been deleted. Reference_id = {$did}";
						$groupedArray[$num]['product_detail'][$num2]['product_name']	=	"product has been deleted. Reference_id = {$did}";
						$groupedArray[$num]['product_detail'][$num2]['product_type']	=	"product has been deleted. Reference_id = {$did}";
						$groupedArray[$num]['product_detail'][$num2]['product_price']	=	"product has been deleted. Reference_id = {$did}";
						$groupedArray[$num]['product_detail'][$num2]['product_discounted_price']	=	"product has been deleted. Reference_id = {$did}";
						$groupedArray[$num]['product_detail'][$num2]['product_description']	=	"product has been deleted. Reference_id = {$did}";
						$groupedArray[$num]['product_detail'][$num2]['product_image_path']	=	"product has been deleted. Reference_id = {$did}";
						$groupedArray[$num]['product_detail'][$num2]['product_restaurant_id']	=	"product has been deleted. Reference_id = {$did}";
						$groupedArray[$num]['product_detail'][$num2]['product_created_by']	=	"product has been deleted. Reference_id = {$did}";
						$groupedArray[$num]['product_detail'][$num2]['product_created_date']	=	"product has been deleted. Reference_id = {$did}";
						$groupedArray[$num]['product_detail'][$num2]['product_updated_by']	=	"product has been deleted. Reference_id = {$did}";
						$groupedArray[$num]['product_detail'][$num2]['product_updated_date']	=	"product has been deleted. Reference_id = {$did}";
					}
					else
						$groupedArray[$num]['product_detail'][$num2]		= array_merge($recordsProdOr[$num2],$recordProduct);
				}
			}
		}
		else
			$groupedArray		= [];
		$data['records']		= $groupedArray;
		$this->load->view('template/template',$data);
	}
	
	function record()
	{
		if($this->session->userdata('identity')!='admin')
		{
			$this->setSomeMessage('You do not  have enough authority to access this feature. Click OK to redirect back to home page.');
			redirect('page/index');	
		}
		else
		{
			$table 			= $this->input->get_post('table')?$this->input->get_post('table'):'owner';
			$tableName		= ['owner','restaurant','customer','product','topup','redeem','order','review'];
			if($table == "order")
			{
				redirect("page/orderTable");
			}
			else
			{
				$records 		= $this->getList($table);
				$pk				= "{$table}_id";
				if($table == 'topup')
				{
					if($records)
					{
						foreach($records as $num => $record)
						{
							$id 		= $record[$pk];
							$records[$num]['Delete']	=	"<a href='adminDelete?table={$table}&id={$id}' class='delBtn' >Delete</a>";
						}
						$attribute		= array_keys($records[0]);
						$data			= 
						[
							'pk'			=> $pk,
							'table'			=> $table,
							'tableName'		=> $tableName,
							'attribute'		=> $attribute,
							'records'		=> $records,
							'identity'		=> $this->session->userdata('identity'),
							'destination'	=> __FUNCTION__
						];
					}
					else
					{
						$data			= 
						[
							'pk'			=> $pk,
							'table'			=> $table,
							'tableName'		=> $tableName,
							'identity'		=> $this->session->userdata('identity'),
							'destination'	=> __FUNCTION__
						];
					}
					$this->load->view('template/template',$data);
				}
				elseif($table=='review')
				{
					if($records)
					{
						foreach($records as $num => $record)
						{
							$id 		= $record[$pk];
							$records[$num]['Delete']	=	"<a href='adminDelete?table={$table}&id={$id}' class='delBtn'>Delete</a>";
						}
						$attribute		= array_keys($records[0]);
						$data			= 
						[
							'pk'			=> $pk,
							'table'			=> $table,
							'tableName'		=> $tableName,
							'attribute'		=> $attribute,
							'records'		=> $records,
							'identity'		=> $this->session->userdata('identity'),
							'destination'	=> __FUNCTION__
						];
					}
					else
					{
						$data			= 
						[
							'pk'			=> $pk,
							'table'			=> $table,
							'tableName'		=> $tableName,
							'identity'		=> $this->session->userdata('identity'),
							'destination'	=> __FUNCTION__
						];
					}
					$this->load->view('template/template',$data);
				}
				elseif($table=='redeem')
				{
					if($records)
					{
						foreach($records as $num => $record)
						{
							$id 		= $record[$pk];
							if($records[$num]['redeem_status']=='pending')
							{
								$records[$num]['Proceed Redemption']	=	"<a href='adminAccept?id={$id}'>Accept</a>";
								$records[$num]['Decline Redemption']	=	"<a href='adminDecline?id={$id}' class='delBtn'>Decline</a>";
							}
							elseif($records[$num]['redeem_status']=='processing')
							{
								$records[$num]['Proceed Redemption']	=	"<a href='adminComplete?id={$id}'>Complete</a>";
								$records[$num]['Decline Redemption']	=	"<a href='adminDecline?id={$id}' class='delBtn'>Decline</a>";
							}
							else
							{
								$records[$num]['Proceed Redemption']	=	"This redemption request has already been closed";
								$records[$num]['Decline Redemption']	=	"This redemption request has already been closed";
							}
							$records[$num]['Delete']	=	"<a href='adminDelete?table={$table}&id={$id}' class='delBtn'>Delete</a>";
						}
						$attribute		= array_keys($records[0]);
						$data			= 
						[
							'pk'			=> $pk,
							'table'			=> $table,
							'tableName'		=> $tableName,
							'attribute'		=> $attribute,
							'records'		=> $records,
							'identity'		=> $this->session->userdata('identity'),
							'destination'	=> __FUNCTION__
						];
					}
					else
					{
						$data			= 
						[
							'pk'			=> $pk,
							'table'			=> $table,
							'tableName'		=> $tableName,
							'identity'		=> $this->session->userdata('identity'),
							'destination'	=> __FUNCTION__
						];
					}
					$this->load->view('template/template',$data);
				}
				else
				{
					$functionName	= "{$table}Form";
					if($records)
					{
						foreach($records as $num => $record)
						{
							$id 		= $record[$pk];
							$records[$num]['Edit']	=	"<a href='{$functionName}?id={$id}'>Edit</a>";
							$records[$num]['Delete']	=	"<a href='adminDelete?table={$table}&id={$id}' class='delBtn'>Delete</a>";
						}
						$attribute		= array_keys($records[0]);
						$data			= 
						[
							'pk'			=> $pk,
							'functionName'	=> $functionName,
							'table'			=> $table,
							'tableName'		=> $tableName,
							'attribute'		=> $attribute,
							'records'		=> $records,
							'identity'		=> $this->session->userdata('identity'),
							'destination'	=> __FUNCTION__
						];
					}
					else
					{	
						$data			= 
						[
							'functionName'	=> $functionName,
							'table'			=> $table,
							'tableName'		=> $tableName,
							'identity'		=> $this->session->userdata('identity'),
							'destination'	=> __FUNCTION__
						];
					}
					$this->load->view('template/template',$data);
				}
			}
		}
	}
	
	function adminAccept()
	{
		$id 	= $this->input->get_post('id');
		if(!$id)
		{
			$this->setSomeMessage("Invalid URL");
			redirect('page/index');
		}
		else
		{	
			$redeem 		= new $this->redeem();
			$redeem->redeem_updated_by		= $this->session->userdata('id');
			$redeem->redeem_updated_date	= date('Y-m-d H:i:s');
			$redeem->redeem_id 				= $id;
			$affected_row 	= $redeem->accept();
			if($affected_row)
			{
				$this->setSomeMessage("Redemption request accepted");
				redirect("page/record?table=redeem");
			}
			else
			{
				$this->setSomeMessage("Opps, look like something went wrong :-(");
				redirect("page/record?table=redeem");
			}
		}
	}
	
	function forgetPassword()
	{
		if(!$this->session->userdata('id'))
		{
			$data	= [
				'identity'	=> $this->session->userdata('identity'),
				'destination'	=> __FUNCTION__
			];
			$error 		= $this->session->flashdata('error');
			if($error)
			{
				$data['error']		= $error;
				$data['retainval']	= $this->session->flashdata('retainval');	
			}
			else
				$data['error']	= false;
			$this->load->view('template/template',$data);
		}
		else
		{
			$this->setSomeMessage("Invalid URL");
			redirect("page/index");
		}
	}
	
	function p_forgetPassword()
	{
		$type 	= $this->input->get_post('radAcc');
		if(!$type || $this->session->userdata('id'))
		{
			$this->setSomeMessage("Invalid URL");
			redirect("page/index");
		}
		else
		{
			if($type == 'customer')
			{
				$object 	= new $this->customer();
				$object->customer_email 		= $this->input->get_post('txtEmail');
				$object->customer_secure 		= md5($this->input->get_post('txtSecure'));
			}
			else
			{
				$object 	= new $this->owner();
				$object->owner_email			= $this->input->get_post('txtEmail');
				$object->owner_secure			= md5($this->input->get_post('txtSecure'));
			}
			$record 	= $object->changePassword();
			if(!$record)
			{
				$this->formFail("forgetPassword","No records found in database. Please make sure you have entered the correct detail of your account.");
			}
			else
			{
				$pk 	= "{$type}_id";
				$id 	= $record[$pk];
				redirect("page/changePassword?id={$id}&type={$type}");
			}
		}
	}
	
	function changePassword()
	{
		$id 	= $this->input->get_post('id');
		$type 	= $this->input->get_post('type');
		if($this->session->userdata('id') || !$id || !$type)
		{
			$this->setSomeMessage("Invalid URL");
			redirect("page/index");
		}
		else
		{
			$data	= [
				'identity'	=> $this->session->userdata('identity'),
				'destination'	=> __FUNCTION__ ,
				'id'		=> $id,
				'type'		=> $type,
			];
			$this->load->view("template/template",$data);
		}
	}
	
	function p_changePassword()
	{
		$password 	= $this->input->get_post('txtPassword');
		$type 		= $this->input->get_post('type');
		$id 		= $this->input->get_post('id');
		if(!$type||!$id||!$password||$this->session->userdata('id'))
		{
			$this->setSomeMessage("Invalid URL");
			redirect("page/index");
		}
		else
		{
			if($type	== 'customer')
			{
				$object		= new $this->customer();
				$object->customer_id		= $id;
				$object->customer_pass		= md5($password);
			}
			else
			{
				$object		= new $this->owner();
				$object->owner_id		= $id;
				$object->owner_pass		= md5($password);
			}
			$affected_row		= $object->passwordchange();
			if($affected_row)
			{
				$this->setSomeMessage("Password changed");
				redirect("page/login");
			}
			else
			{
				$this->setSomeMessage("Server Error: Unable to update record into database. Please try to order again later or contact admin for help.");
				redirect("page/login");
			}
		}
	}
	
	function deleteProduct()
	{
		$id 	= $this->input->get_post('id');
		if(!$id||$this->session->userdata('identity')!='owner')
		{
			$this->setSomeMessage("Invalid URL");
			redirect('page/index');
		}
		else
		{
			$checked 		= $this->session->flashdata('checked');
			if(!$checked)
			{
				$this->setSome('prevdest',"deleteProduct?id={$id}");
				redirect("page/promptsecure");
			}
			else
			{
				$product 	= new $this->product();
				$product->product_id 	= $id;
				$affected_row 	= $product->remove();
				if($affected_row)
				{
					$this->setSomeMessage("Product successfully removed");
					redirect("page/restaurant");
				}
				else
				{
					$this->setSomeMessage("Server Error: Unable to delete record from database. Please try to order again later or contact admin for help.");
					redirect("page/restaurant");
				}
			}
		}
	}
	
	function adminComplete()
	{
		$id 	= $this->input->get_post('id');
		if(!$id||$this->session->userdata('identity')!='admin')
		{
			$this->setSomeMessage("Invalid URL");
			redirect('page/index');
		}
		else
		{	
			$recordRed 		= $this->getDetail("redeem",$id);
			$rid 			= $recordRed['redeem_created_by'];
			$amount 		= $recordRed['redeem_amount'];
			$resRecord 		= $this->getDetail("restaurant",$rid);
			$money 			= $resRecord['restaurant_balance'];
			$money 			-= $amount;
			$restaurant 	= new $this->restaurant();
			$restaurant->restaurant_updated_by		= $this->session->userdata('id');
			$restaurant->restaurant_balance			= $money;
			$restaurant->restaurant_updated_date	= date('Y-m-d H:i:s');
			$restaurant->restaurant_id				= $rid;
			$affected_row		= $restaurant->updatewallet();
			if($affected_row)
			{
				$redeem 		= new $this->redeem();
				$redeem->redeem_closed_by		= $this->session->userdata('id');
				$redeem->redeem_id				= $id;
				$redeem->redeem_closed_date		= date('Y-m-d H:i:s');
				$affected_row 	= $redeem->complete();
				if($affected_row)
				{
					$this->setSomeMessage("Redemption completed");
					redirect("page/record?table=redeem");
				}
				else
				{
					$this->setSomeMessage("Opps, look like something went wrong :-(");
					redirect("page/record?table=redeem");
				}
			}
			else
			{
				$this->setSomeMessage("Opps, look like something went wrong :-(");
				redirect("page/record?table=redeem");
			}
		}
	}
	
	function adminDecline()
	{
		$id 	= $this->input->get_post('id')?$this->input->get_post('id'):$this->session->userdata('request_id');
		if($this->session->userdata('request_id'))
			$this->session->unset_userdata('request_id');
		if(!$id)
		{
			$this->setSomeMessage("Invalid URL");
			redirect("page/index");
		}
		else
		{
			$reason 		= $this->session->userdata('reason');
			if(!$reason)
			{
				$this->setSome('prevdest',"adminDecline");
				$this->setSome('request_id',$id);
				redirect("page/promptreason");
			}
			else
			{
				$this->session->unset_userdata('reason');
				$redeem 	= new $this->redeem();
				$redeem->redeem_id 		= $id;
				$redeem->redeem_status_remark	= $reason;
				$redeem->redeem_closed_by		= $this->session->userdata('id');
				$redeem->redeem_created_date	= date('Y-m-d H:i:s');
				$affected_row 	= $redeem->decline();
				if($affected_row)
				{
					$this->setSomeMessage("Redemption request declined");
					redirect("page/record?table=redeem");
				}
				else
				{
					$this->setSomeMessage("Opps, look like something went wrong :-(");
					redirect("page/record?table=redeem");
				}
			}
		}
	}
	
	function adminDelete()
	{
		$table 			= $this->input->get_post('table');
		$pk 			= $this->input->get_post('id');
		if(!($pk&&$table))
		{
			$this->setSomeMessage("Invalid URL");
			$this->redirect("page/index");
		}
		else
		{
			switch($table)
			{
				case "owner":
					$object 					= new $this->owner();
					$object->owner_id 			= $pk;
					break;
				case "restaurant":
					$object 					= new $this->restaurant();
					$object->restaurant_id 		= $pk;
					break;
				case "customer":
					$object 					= new $this->customer();
					$object->customer_id 		= $pk;
					break;
				case "topup":
					$object 					= new $this->topup();
					$object->topup_id 			= $pk;
					break;
				case "redeem":
					$object 					= new $this->redeem();
					$object->redeem_id 			= $pk;
					break;
				case "order":
					$object 							= new $this->order();
					$object->order_id 					= $pk;
					$object2 							= new $this->productorder();
					$object2->productorder_order_id 	= $pk;
					break;
				case "review":
					$object 					= new $this->review();
					$object->review_id			= $pk;
					break;
				default:
					die("Table doens't exists or included in function ". __FUNCTION__ .".");
					break;
			}
			$affected_row 	= $object->remove();
			if(isset($object2))
			{
				$affected_row2 		= $object2->remove();
				$affected_row		= boolval($affected_row && $affected_row2);
			}
			if($affected_row)
			{
				$this->setSomeMessage("Record Has Been Deleted");
				redirect("page/record?table={$table}");
			}
			else
			{
				$this->setSomeMessage("Opps, look like something went wrong :-(");
				redirect("page/record?table={$table}");
			}
		}
	}

	function getList($table)//Needed to Update Frequently
	{
		switch($table)
		{
			case "owner":
				$object 	= new $this->owner();
				break;
			case "restaurant":
				$object 	= new $this->restaurant();
				break;
			case "customer":
				$object		= new $this->customer();
				break;
			case "admin":
				$object		= new $this->admin();
				break;
			case "product":
				$object		= new $this->product();
				break;
			case "order":
				$object		= new $this->order();
				break;
			case "productorder":
				$object		= new $this->productorder();
				break;
			case "topup":
				$object		= new $this->topup();
				break;
			case "redeem":
				$object		= new $this->redeem();
				break;
			case "review":
				$object		= new $this->review();
				break;
			default:
				die("Table doens't exists or included in function ". __FUNCTION__ .".");
				break;
		}
		$record		= $object->getList();
		return $record;
	}
	
	function getDetail($table,$pk,$pk2 = false)//Needed to Update Frequently
	{
		switch($table)
		{
			case "owner":
				$object 				= new $this->owner();
				$object->owner_id		= $pk;
				break;
			case "restaurant":
				$object 				= new $this->restaurant();
				$object->restaurant_id	= $pk;
				break;
			case "customer":
				$object					= new $this->customer();
				$object->customer_id	= $pk;
				break;
			case "product":
				$object 				= new $this->product();
				$object->product_id 	= $pk;
				break;
			case "admin":
				$object 				= new $this->admin();
				$object->admin_id	 	= $pk;
				break;
			case "topup":
				$object					= new $this->topup();
				$object->topup_id		= $pk;
				break;
			case "redeem":
				$object 				= new $this->redeem();
				$object->redeem_id		= $pk;
				break;
			case "productorder":
				$object 							= new $this->productorder();
				$object->productorder_order_id		= $pk;
				$object->productorder_product_id	= $pk2;
				break;
			case "order":
				$object 				= new $this->order();
				$object->order_id		= $pk;
				break;
			case "review":
				$object 				= new $this->review();
				$object->review_id		= $pk;
			default:
				die("Table doens't exists or included in function ".__FUNCTION__ .".");
				break;
		}
		$record		= $object->getDetail();
		return $record;
	}
	
	function ownerForm()
	{
		if($this->session->userdata('identity')!='admin'&&$this->session->userdata('identity')!='owner')
		{
			$this->setSomeMessage("You do not have enough authority to access this feature. Click OK to redirect back to home page.");
			redirect('page/index');	
		}
		else
		{
			$data 	= [
				'identity'		=> $this->session->userdata('identity'),
				'destination'	=> __FUNCTION__
			];
			$error 	= $this->session->flashdata('error');
			if($error)
				$record = $this->session->flashdata('retainval');
			elseif($this->input->get_post('id'))
			{
				$id 	= $this->input->get_post('id');
				$record = $this->getDetail("owner",$id);
			}
			elseif($this->session->userdata('identity')=='owner')
			{
				$id		= $this->session->userdata('id');
				$record = $this->getDetail("owner",$id);
			}
			if(isset($record))
				$data['record']	= $record;
			else
				$data['record']	= false;
			if($error)
				$data['error']	= $error;
			if(!$this->input->get_post('id') && $this->session->userdata('identity')!='owner')
				$isNew 			= true;
			if(!isset($isNew))
				$isNew 			= false;
			$data['isNew']	 	= $isNew;
			$this->load->view('template/template',$data);
		}
	}
	
	function setSomeMessage($message = false)
	{
		if($message == false)
			die("No Message is passed to function ".__FUNCTION__ .".");
		$this->setSomeFlash('message',$message);
	}
	
	function p_ownerform()
	{
		if($this->session->userdata('identity')=='admin')
		{
			$owner 	= new $this->owner();
			$owner->owner_email 	= $this->input->get_post('txtEmail');
			$owner->owner_id 		= $this->input->get_post('hidID')?$this->input->get_post('hidID'):0;
			$isExist 	= $owner->checkExist();
			if($isExist)
			{
				$this->formFail("ownerForm","Email has already used by other account");
			}
			else
			{
				$status 	= $this->input->get_post('selStatus');
				$owner->owner_name		= $this->input->get_post('txtName');
				$owner->owner_gender 	= $this->input->get_post('radGender');
				$owner->owner_birth		= $this->input->get_post('txtBirth');
				$owner->owner_contact	= $this->input->get_post('txtCont');
				$owner->owner_address	= $this->input->get_post('txtAddress');
				$owner->owner_state		= $this->input->get_post('selState');
				$owner->owner_zip		= $this->input->get_post('txtZip');
				$owner->owner_sub		= $this->input->get_post('chkSub')?1:0;
				$owner->owner_status	= $status;
				$owner->owner_status_remark	= $this->input->get_post('txtStatusRe');
				if($this->input->get_post('hidID'))
				{
					$restaurant = new $this->restaurant();
					$restaurant->restaurant_owner_id 	= $this->input->get_post('hidID');
					if($this->input->get_post('txtStatusRe'))
					{
						if($status=="verified")
						{
							$owner->owner_verified_by			= $this->session->userdata('id');
							$owner->owner_verified_date			= date('Y-m-d H:i:s');
							$affected_row2 		= $restaurant->verify();
							$affected_row 		= $owner->update1();
						}
						elseif($status=="approved")
						{
							$owner->owner_approved_by		= $this->session->userdata('id');
							$owner->owner_approved_date		= date('Y-m-d H:i:s');
							$affected_row2 		= $restaurant->approve();
							$affected_row 		= $owner->update2();
						}
					}
					else
					{
						$owner->owner_updated_by		= $this->session->userdata('id');
						$owner->owner_updated_date		= date('Y-m-d H:i:s');
						$affected_row 		= $owner->update3();
						$affected_row2		= true;
					}
					if($affected_row && $affected_row2)
					{
						$this->setSomeMessage('Information Update Completely.');
						redirect('page/record');
					}
					else
					{
						$this->formFail("ownerForm","Server Error: Unable to insert record into database. <br />Please try again later or contact admin for help.");
					}
				}
				else
				{
					$owner->owner_pass			= md5("123456789");
					$owner->owner_secure		= md5("123456");
					$owner->owner_created_by	= $this->session->userdata('id');
					$owner->owner_created_date	= date('Y-m-d H:i:s');
					if($status=="verified")
					{
						$owner->owner_verified_by			= $this->session->userdata('id');
						$owner->owner_verified_date			= date('Y-m-d H:i:s');
					}
					elseif($status=="approved")
					{
						$owner->owner_approved_by		= $this->session->userdata('id');
						$owner->owner_approved_date		= date('Y-m-d H:i:s');
					}
					elseif($status=="timeout"||$status=="disapproved")
					{
						$owner->owner_updated_by		= $this->session->userdata('id');
						$owner->owner_updated_date		= date('Y-m-d H:i:s');
					}
					$insert_id		= $owner->insert();
					if($insert_id)
					{
						$this->setSomeMessage('New Owner Added Successfully');
						redirect('page/record');
					}
					else
					{
						$this->formFail("ownerForm","Server Error: Unable to insert record into database. <br />Please try again later or contact admin for help.");
					}
				}
			}
		}
		else
		{
			$owner 	= new $this->owner();
			$owner->owner_email 	= $this->input->get_post('txtEmail');
			$owner->owner_id 		= $this->input->get_post('hidID')?$this->input->get_post('hidID'):0;
			$isExist 	= $owner->checkExist();
			if($isExist)
			{
				$this->formFail("ownerForm","Email has already used by other account");
			}
			else
			{
				$owner->owner_name			= $this->input->get_post('txtName');
				$owner->owner_gender 		= $this->input->get_post('radGender');
				$owner->owner_birth			= $this->input->get_post('txtBirth');
				$owner->owner_contact		= $this->input->get_post('txtCont');
				$owner->owner_address		= $this->input->get_post('txtAddress');
				$owner->owner_state			= $this->input->get_post('selState');
				$owner->owner_zip			= $this->input->get_post('txtZip');
				$owner->owner_sub			= $this->input->get_post('chkSub')?1:0;
				$owner->owner_updated_by	= 0;
				$owner->owner_updated_date	= date('Y-m-d H:i:s');
				$affected_row 		= $owner->update3();
				if($affected_row)
				{
					$this->setSomeMessage("Information Update Completely.");
					redirect('page/ownerForm');
				}
				else
				{
					$this->formFail("ownerForm","Server Error: Unable to insert record into database. <br />Please try again later or contact admin for help.");
				}
			}
		}
	}
	
	function testcibai()
	{
		echo "
		<form action='p_testcibai'>
		<input type='number' name='test' step='0.59'/>
		<input type='submit'/>
		</form>
		";
	}
	function p_testcibai()
	{
		echo "<pre>";
		var_dump($this->input->get_post('test'));
		die();
	}
	
	function convertArrayToString($array = false,$indexSeparator=',',$keyIdentifier='=',$elementSeparator='-')
	{
		$string = "";
		$keys = array_keys($array);
		for($i=0;$i<count($array);$i++)
		{
			$string .= $keys[$i].$keyIdentifier;
			for($x=0;$x<count($array[$keys[$i]]);$x++)
			{
				$string .= $array[$keys[$i]][$x].$elementSeparator;
			}
			$string .= $indexSeparator;
		}
		return $string;
	}
	
	function convertStringToArray($string ="qwer=1000-855-,pokdd=2456-855-,asfgg=8555-789-,mdfkgentl=155255-7520-,",$indexSeparator = ',',$keyIdentifier = '=',$elementSeparator = '-')
	{
		$totalElement = substr_count($string,$indexSeparator);
		$startpos = 0;
		$array =[];
		for($i=0;$i<$totalElement;$i++)
		{
			$endpos = strpos($string,$indexSeparator);//
			$length = $endpos - $startpos +1;//
			$foo = substr($string,$startpos,$length-1);//
			$string = substr($string,$endpos+1,strlen($string));//
			$keyendpos = strpos($foo,$keyIdentifier);
			$keylength = $keyendpos - $startpos +1;
			$key = substr($foo,$startpos,$keylength-1);
			$foo = substr($foo,$keyendpos+1,strlen($foo));
			$totalElementDeeper = substr_count($foo,$elementSeparator);
			for($x=0;$x<$totalElementDeeper;$x++)
			{
				$separatorpos = strpos($foo,$elementSeparator);
				$elementlength = $separatorpos - $startpos +1;
				$element = substr($foo,$startpos,$elementlength-1);
				$foo = substr($foo,$separatorpos+1,strlen($foo));
				$array[$key][] = $element;
			}
			
			//echo "...".$foo."????".$string."<br />";
		}
		return $array;
	}
	
	function qwert()
	{
		echo "<form action='p_qwert'>
		<input type='time' name='rrr'/>
		<input type='submit'/>
		</form>
		";
	}
	
	function restaurantForm()
	{
		
		if($this->session->userdata('identity')!='admin' && $this->session->userdata('identity')!='owner')
		{
			$this->setSomeMessage("You do not have enough authority to access this feature. Click OK to redirect back to home page.");
			redirect('page/index');	
		}
		else
		{
			$data 	= [
				'identity'		=> $this->session->userdata('identity'),
				'destination'	=> __FUNCTION__
			];
			$error 	= $this->session->flashdata('error');
			if($error)
				$record = $this->session->flashdata('retainval');
			elseif($this->input->get_post('id'))
			{
				$id 	= $this->input->get_post('id');
				$record = $this->getDetail("restaurant",$id);
			}
			elseif($this->session->userdata('identity')=='owner')
			{
				$id 		= $this->session->userdata('id');
				$record 	= $this->getRestaurantByOID($id); 
			}
			if(isset($record))
			{
				$businessHour = $record['restaurant_business_hour']; 
				unset($record['restaurant_business_hour']);
				$days	= ['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'];
				if($businessHour !="")
				{
					$record['restaurant_business_hour'] = $this->convertStringToArray($businessHour);
					$record['restaurant_business_day_1'] = array_keys($record['restaurant_business_hour']);
					for($i=0;$i<7;$i++)
					{
						if(!isset($record['restaurant_business_hour'][$days[$i]]))
						{
							for($x=0;$x<2;$x++)
								$record['restaurant_business_hour'][$days[$i]][$x]=null;
							$record['restaurant_business_day_1'][] = null;
						}
					}
				}
				else
				{
					for($i=0;$i<7;$i++)
					{
						for($x=0;$x<2;$x++)
							$record['restaurant_business_hour'][$days[$i]][$x] = null;
						$record['restaurant_business_day_1'][] = null;
					}
				}
				$deliTime		= $record['restaurant_deliver_time'];
				unset($record['restaurant_deliver_time']);
				$record['restaurant_deliver_time']['hours']		= substr($deliTime,0,2);
				$record['restaurant_deliver_time']['minutes']	= substr($deliTime,3,2);
				$data['record']	= $record;
			}
			else
				$data['record']	= false;
			if($error)
				$data['error']	= $error;
			$isNew 			= $this->session->flashdata('isNew');
			if($this->input->get_post('id') || (isset($isNew)&&$isNew==false))
				$isNew 			= false;
			else
				$isNew 			= true;
			$this->setSomeFlash('isNew',$isNew);
			$data['isNew']		= $isNew;
			$this->load->view('template/template',$data);
		}
	}

	//upload
	/*
	function testupload()
	{
		$this->load->helper(array('form', 'url'));
		$this->load->view('test/testupload',['error'=>'']);
	}
	
	function upload()
	{
		$this->load->helper(array('form', 'url'));
		$config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'gif|jpg|png';
		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload('userfile'))
        {
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('test/testupload', $error);
		}
        else    
		{
			$data = array('upload_data' => $this->upload->data());
			$this->load->view('test/upload_success', $data);
		}
	}
	//*/
	//upload
	function p_restaurantform()
	{
		$restaurant = new $this->restaurant();
		$id = $this->input->get_post('hidID')?$this->input->get_post('hidID'):0;
		$restaurant->restaurant_id	= $id;
		$restaurant->restaurant_address = $this->input->get_post('txtAddress');
		$isExist = $restaurant->checkExist();
		if($isExist)
		{
			$noBuisnessDay = $this->input->get_post('chkDay7');
			$days   	= [];
			if(!isset($noBuisnessDay))
			{
				$businessDay		= "";
				for($i=0;$i<7;$i++)
				{
					if($this->input->get_post("chkDay{$i}"))
					{
						$days[$this->input->get_post("chkDay{$i}")][0] = $this->input->get_post("start{$i}");
						$days[$this->input->get_post("chkDay{$i}")][1] = $this->input->get_post("end{$i}");
						$businessDay 	.= $this->input->get_post("chkDay{$i}").",";
					}
				}
				$daystring	= $this->convertArrayToString($days);
				$restaurant->restaurant_business_day	= $businessDay;
				$restaurant->restaurant_business_hour	= $daystring;
				$things 	= ['businessDay','daystring'];
				$value 		= [$businessDay,$daystring];
				$this->setSomeFlash($things,$value);
			}
			$this->formFail("restaurantForm","The restaurant address already registered in our website. Please check your address if it is entered correctly.");
		}
		else
		{
			if($id)//must be update
			{
				
				$restaurant->restaurant_name = $this->input->get_post('txtName');
				$restaurant->restaurant_contact = $this->input->get_post('txtCont');
				$restaurant->restaurant_state = $this->input->get_post('selState');
				$restaurant->restaurant_zip = $this->input->get_post('txtZip');
				$restaurant->restaurant_title = $this->input->get_post('txtTitle');
				$restaurant->restaurant_description = $this->input->get_post('txtDesc');
				$noBuisnessDay = $this->input->get_post('chkDay7');
				$days   	= [];
				if(!isset($noBuisnessDay))
				{
					$businessDay		= "";
					for($i=0;$i<7;$i++)
					{
						if($this->input->get_post("chkDay{$i}"))
						{
							$days[$this->input->get_post("chkDay{$i}")][0] = $this->input->get_post("start{$i}");
							$days[$this->input->get_post("chkDay{$i}")][1] = $this->input->get_post("end{$i}");
							$businessDay 	.= $this->input->get_post("chkDay{$i}").",";
						}
					}
					$daystring	= $this->convertArrayToString($days);
					$restaurant->restaurant_business_day	= $businessDay;
					$restaurant->restaurant_business_hour	= $daystring;
				}
				else
				{
					$restaurant->restaurant_business_day	= "";
					$restaurant->restaurant_business_hour	= "";
				}
				$restaurant->restaurant_deliver_fee	= $this->input->get_post('txtDeliFee');
				$restaurant->restaurant_deliver_coverage	= $this->input->get_post('txtDeliCov');
				$restaurant->restaurant_deliver_minimum_order	= $this->input->get_post('txtDeliMin');
				$restaurant->restaurant_deliver_time	= $this->input->get_post('txtDeliHours').":".$this->input->get_post('txtDeliMins').":00";
				$restaurant->restaurant_cod 			= $this->input->get_post('radCOD')=='Yes'?1:0;
				$restaurant->restaurant_updated_date	= date('Y-m-d H:i:s');
				if($this->session->userdata('identity')=='owner')
					$restaurant->restaurant_updated_by	= 0;
				else
					$restaurant->restaurant_updated_by	= $this->session->userdata('id');
				$img			= $this->input->get_post('radImg');
				if($img=='Yes')
				{
					$config 		=
					[
						'upload_path'		=> './uploads/restaurants/',
						'encrypt_name'		=> true,
						'allowed_types'		=> 'gif|jpg|png',
					];
					$this->load->library('upload',$config);
					if(!$this->upload->do_upload('fileImage'))
					{
						$this->formFail('restaurantForm',$this->upload->display_errors());
					}
					else
					{
						$upload_data 	= $this->upload->data();
						$restaurant->restaurant_image_path 	= "uploads/restaurants/".$upload_data['file_name'];
					}
				}
				else
				{
					$restaurant->restaurant_image_path		= $this->input->get_post('hidImg');
				}
				$affected_row		= $restaurant->update();
				if($affected_row)
				{
					$this->setSomeMessage("Information Update Successfully");
					if($this->session->userdata('identity')=='owner')
						redirect("page/restaurant");
					else
						redirect("page/record");
				}
				else
				{
					$this->formFail("restaurantform","Server Error: Unable to insert record into database. <br />Please try again later or contact admin for help.");
				}
			}
			else//must be admin create
			{
				if($this->input->get_post('txtOwner'))//linked to owner
				{
					$pk 		= $this->input->get_post('txtOwner');
					$isExist	= $this->getDetail('owner',$pk);
					if(!$isExist)
					{
						$this->formFail("restaurantForm","The owner id doesn't exists in our database.");
					}
					else
					{
						$restaurant->restaurant_status		= "pending";
						$restaurant->restaurant_owner_id	=  $this->input->get_post('txtOwner');$restaurant->restaurant_name = $this->input->get_post('txtName');
						$restaurant->restaurant_name	= $this->input->get_post('txtName');
						$restaurant->restaurant_contact = $this->input->get_post('txtCont');
						$restaurant->restaurant_state = $this->input->get_post('selState');
						$restaurant->restaurant_zip = $this->input->get_post('txtZip');
						$restaurant->restaurant_title = $this->input->get_post('txtTitle');
						$restaurant->restaurant_description = $this->input->get_post('txtDesc');
						$noBuisnessDay = $this->input->get_post('chkDay7');
						$days   	= [];
						if(!isset($noBuisnessDay))
						{
							$businessDay	= "";
							for($i=0;$i<7;$i++)
							{
								if($this->input->get_post("chkDay{$i}"))
								{
									$days[$this->input->get_post("chkDay{$i}")][0] = $this->input->get_post("start{$i}");
									$days[$this->input->get_post("chkDay{$i}")][1] = $this->input->get_post("end{$i}");
									$businessDay	.= $this->input->get_post("chkDay{$i}").",";
								}
								else
									continue;
							}
							$daystring	= $this->convertArrayToString($days);
							$restaurant->restaurant_business_hour	= $daystring;
							$restaurant->restaurant_business_day	= $businessDay;
						}
						else
						{
							$restaurant->restaurant_business_hour	= "";
						}
						$restaurant->restaurant_deliver_fee			= $this->input->get_post('txtDeliFee');
						$restaurant->restaurant_deliver_coverage	= $this->input->get_post('txtDeliCov');
						$restaurant->restaurant_deliver_minimum_order	= $this->input->get_post('txtDeliMin');
						$restaurant->restaurant_deliver_time	= $this->input->get_post('txtDeliHours').":".$this->input->get_post('txtDeliMins').":00";
						$restaurant->restaurant_rating			= "3.00";
						$restaurant->restaurant_cod 			= $this->input->get_post('radCOD')=='Yes'?1:0;
						$restaurant->restaurant_created_by		= $this->session->userdata('id');
						$restaurant->restaurant_created_date		= date('Y-m-d H:i:s');
						$img			= $this->input->get_post('radImg');
						if($img=='Yes')
						{
							$config 		=
							[
								'upload_path'		=> './uploads/restaurantss/',
								'encrypt_name'		=> true,
								'allowed_types'		=> 'gif|jpg|png',
							];
							$this->load->library('upload',$config);
							if(!$this->upload->do_upload('fileImage'))
							{
								$this->formFail('restaurantForm',$this->upload->display_errors());
							}
							else
							{
								$upload_data 	= $this->upload->data();
								$restaurant->restaurant_image_path 	= "uploads/restaurants/".$upload_data['file_name'];
							}
						}
						else
						{
							$restaurant->restaurant_image_path		= $this->input->get_post('hidImg');
						}
						$insert_id	= $restaurant->insert();
						if($insert_id)
						{
							$this->setSomeMessage("Restaurant Added Successfully!");
							redirect('page/restaurantForm');
						}
						else
						{
							$this->formFail("restaurantForm","Server Error: Unable to insert record into database. <br />Please try again later or contact admin for help.");
						}
					}
				}
				else
				{
					$restaurant->restaurant_status		= "unregistered";
					$restaurant->restaurant_name	= $this->input->get_post('txtName');
					$restaurant->restaurant_contact = $this->input->get_post('txtCont');
					$restaurant->restaurant_state = $this->input->get_post('selState');
					$restaurant->restaurant_zip = $this->input->get_post('txtZip');
					$restaurant->restaurant_title = $this->input->get_post('txtTitle');
					$restaurant->restaurant_description = $this->input->get_post('txtDesc');
					$noBuisnessDay = $this->input->get_post('chkDay7');
					$days   	= [];
					if(!isset($noBuisnessDay))
					{
						for($i=0;$i<7;$i++)
						{
							if($this->input->get_post("chkDay{$i}"))
							{
								$days[$this->input->get_post("chkDay{$i}")][0] = $this->input->get_post("start{$i}");
								$days[$this->input->get_post("chkDay{$i}")][1] = $this->input->get_post("end{$i}");
								$daystring	= $this->convertArrayToString($days);
							}
							else
								continue;
						}
						$restaurant->restaurant_business_hour	= $daystring;
					}
					else
						$restaurant->restaurant_business_hour	= "-";
					$restaurant->restaurant_cod 			= $this->input->get_post('radCOD')=='Yes'?1:0;
					$restaurant->restaurant_created_by		= $this->session->userdata('id');
					$restaurant->restaurant_created_date	= date('Y-m-d H:i:s');
					$img			= $this->input->get_post('radImg');
					if($img=='Yes')
					{
						$config 		=
						[
							'upload_path'		=> './uploads/restaurantss/',
							'encrypt_name'		=> true,
							'allowed_types'		=> 'gif|jpg|png',
						];
						$this->load->library('upload',$config);
						if(!$this->upload->do_upload('fileImage'))
						{
							$this->formFail('restaurantForm',$this->upload->display_errors());
						}
						else
						{
							$upload_data 	= $this->upload->data();
							$restaurant->restaurant_image_path 	= "uploads/restaurants/".$upload_data['file_name'];
						}
					}
					else
					{
						$restaurant->restaurant_image_path		= $this->input->get_post('hidImg');
					}
					$insert_id	= $restaurant->insert();
					if($insert_id)
					{
						$this->setSomeMessage("Restaurant Added Successfully!");
						redirect('page/restaurantForm');
					}
					else
					{
						$this->formFail("restaurantForm","Server Error: Unable to insert record into database. <br />Please try again later or contact admin for help.");
					}
				}
			}
		}
	}
	
	function customerProfile()
	{
		if($this->session->userdata('identity')=='customer')
		{
			$id 	= $this->session->userdata('id');
			$record 	= $this->getDetail("customer",$id);
			$data	= [
				'identity'	=> $this->session->userdata('identity'),
				'destination'	=> __FUNCTION__,
				'record'	=> $record,
			];
			$this->load->view('template/template',$data);
		}
		else
		{
			$this->setSomeMessage("You need to login as customer before you can access the customer profile page.");
			redirect('page/index');
		}
	}
	
	function customerForm()
	{
		if($this->session->userdata('identity')!='admin' && $this->session->userdata('identity')!='customer')
		{
			$this->setSomeMessage('You do not have enough authority to access this feature. Click OK to redirect back to home page.');
			redirect('page/index');
		}
		else
		{
			$data	= [
				'identity'	=> $this->session->userdata('identity'),
				'destination'	=> __FUNCTION__
			];
			$error = $this->session->flashdata('error');
			if($error)
			{
				$record 	= $this->session->flashdata('retainval');
			}
			elseif($this->input->get_post('id'))
			{
				$id 		= $this->input->get_post('id');
				$record		= $this->getDetail("customer",$id);
			}
			elseif($this->session->userdata('identity')=='customer')
			{
				$id 		= $this->session->userdata('id');
				$record 	= $this->getDetail("customer",$id);
			}
			else
				$record 	= false;
			$isNew 			= $this->session->flashdata('isNew');
			if($this->input->get_post('id') || (isset($isNew)&&$isNew==false) || $this->session->userdata('identity')=='customer')
				$isNew 		= false;
			else
				$isNew 		= true;
			$this->setSomeFlash('isNew',$isNew);
			$data['isNew']	= $isNew;
			$data['record']	= $record;
			if($error)
				$data['error']	= $error;
			$this->load->view('template/template',$data);
		}
	}
	
	function p_customerForm()
	{
		if($this->session->userdata('identity')=='admin')
		{
			$customer 					= new $this->customer();
			$customer->customer_email 	= $this->input->get_post('txtEmail');
			$customer->customer_id 		= $this->input->get_post('hidID')?$this->input->get_post('hidID'):0;
			$isExist 	= $customer->checkExist();
			if($isExist)
			{
				$this->formFail("customerForm","Email has already used by other account");
			}
			else
			{
				if($this->input->get_post('hidID'))
				{
					$record 					= $this->getDetail("customer",$this->session->userdata('id'));
					if(!$this->input->get_post('txtStatusRe'))
					{
						$customer->customer_status				= $record['customer_status'];
						$customer->customer_status_remark		= $record['customer_status_remark'];
					}
					else
					{
						$customer->customer_status				= $this->input->get_post('selStatus');
						$customer->customer_status_remark		= $this->input->get_post('txtStatusRe');
					}
					$customer->customer_name				= $this->input->get_post('txtName');
					$customer->customer_gender				= $this->input->get_post('radGender');
					$customer->customer_birth				= $this->input->get_post('txtBirth');
					$customer->customer_contact				= $this->input->get_post('txtCont');
					$customer->customer_address				= $this->input->get_post('txtAddress');
					$customer->customer_state				= $this->input->get_post('selState');
					$customer->customer_zip					= $this->input->get_post('txtZip');
					$customer->customer_sub					= $this->input->get_post('chkSub')?1:0;
					$customer->customer_updated_by			= $this->session->userdata('id');
					$customer->customer_updated_date		= date('Y-m-d H:i:s');
					$affected_row 		= $customer->update();
					if($affected_row)
					{
						$this->setSomeMessage("Customer Information Updated");
						redirect("page/record?table=customer");
					}
					else
					{
						$this->formFail("customerForm","Server Error: Unable to insert record into database. <br />Please try again later or contact admin for help.");
					}
				}
				else
				{
					$customer->customer_name	= $this->input->get_post('txtName');
					$customer->customer_gender	= $this->input->get_post('radGender');
					$customer->customer_birth	= $this->input->get_post('txtBirth');
					$customer->customer_contact	= $this->input->get_post('txtCont');
					$customer->customer_address	= $this->input->get_post('txtAddress');
					$customer->customer_state	= $this->input->get_post('selState');
					$customer->customer_zip		= $this->input->get_post('txtZip');
					$customer->customer_sub		= $this->input->get_post('chkSub')?1:0;
					$customer->customer_pass	= "123456789";
					$customer->customer_secure	= "123456";
					$customer->customer_status	= $this->input->get_post('selStatus');
					$customer->customer_status_remark	= $this->input->get_post('txtStatusRe');
					$customer->customer_created_by	= $this->session->userdata('id');
					$customer->customer_created_date	= date('Y-m-d H:i:s');
					$insert_id 		= $customer->insert();
					if($insert_id)
					{
						$this->setSomeMessage("Customer added");
						redirect("page/record?table=customer");
					}
					else
					{
						$this->formFail("customerForm","Server Error: Unable to insert record into database. <br />Please try again later or contact admin for help.");
					}
				}
			}
		}
		else
		{
			$customer 					= new $this->customer();
			$record 					= $this->getDetail("customer",$this->session->userdata('id'));
			$customer->customer_id 					= $this->session->userdata('id');
			$customer->customer_status				= $record['customer_status'];
			$customer->customer_status_remark		= $record['customer_status_remark'];
			$customer->customer_name				= $this->input->get_post('txtName');
			$customer->customer_gender				= $this->input->get_post('radGender');
			$customer->customer_birth				= $this->input->get_post('txtBirth');
			$customer->customer_contact				= $this->input->get_post('txtCont');
			$customer->customer_address				= $this->input->get_post('txtAddress');
			$customer->customer_state				= $this->input->get_post('selState');
			$customer->customer_zip					= $this->input->get_post('txtZip');
			$customer->customer_sub					= $this->input->get_post('chkSub')?1:0;
			$customer->customer_updated_date		= date('Y-m-d H:i:s');
			$affected_row 	= $customer->update();
			if($affected_row)
			{
				$this->setSomeMessage("Information updated");
				redirect("page/customerProfile");
			}
			else
			{
				$this->formFail("customerForm","Server Error: Unable to insert record into database. <br />Please try again later or contact admin for help.");
			}
		}
	}

	function terms()
	{
		$data	= [
			'identity'	=> $this->session->userdata('identity'),
			'destination'	=> __FUNCTION__
		];
		$this->load->view('template/template',$data);
	}
	
	function productForm()
	{
		if($this->session->userdata('identity')!='admin' && $this->session->userdata('identity')!='owner')
		{
			$this->setSomeMessage('You do not have enough authority to access this feature. Click OK to redirect back to home page.');
			redirect('page/index');
		}
		else
		{
			$checked 		= $this->session->flashdata('checked');
			if($this->session->userdata('identity')=='owner' && !$checked)
			{
				$id		= $this->input->get_post('id');
				if($id)
					$appString 		= "?id={$id}";
				else
					$appString		= "";
				$this->setSome('prevdest',"productForm{$appString}");
				redirect("page/promptsecure");
			}
			else
			{
				$data	= [
					'identity'		=> $this->session->userdata('identity'),
					'destination'	=> __FUNCTION__
				];
				$error 	= $this->session->flashdata('error');
				if($error)
				{
					$record 	= $this->session->flashdata('retainval');
					$rid 		= $record['product_restaurant_id'];
					$recordsprod 	= $this->getProductsByRid($rid);
					$productType 	= [];
					$productType2	=[];
					if($recordsprod)
					{
						foreach($recordsprod as $num 	=> $attr)
						{
							$productType[$attr['product_type']]		= true;//to avoid duplicate of product type, 1 less steps compare to array_unique
							$trimProdType 		= str_replace(' ','',$attr['product_type']);
							$productType2[$trimProdType]			= true;
						}
						$productType 	= array_keys($productType);
						$productType2 	= array_keys($productType2);
					}
				}
				elseif($this->input->get_post('id'))
				{
					$id 		= $this->input->get_post('id');
					$record 	= $this->getDetail("product",$id);
					$rid 		= $record['product_restaurant_id'];
					$recordsprod 	= $this->getProductsByRid($rid);
					$productType 	= [];
					foreach($recordsprod as $num 	=> $attr)
					{
						$productType[$attr['product_type']]		= true;//to avoid duplicate of product type, 1 less steps compare to array_unique
						$trimProdType 		= str_replace(' ','',$attr['product_type']);
						$productType2[$trimProdType]			= true;
					}
					$productType 	= array_keys($productType);
					$productType2 	= array_keys($productType2);
				}
				elseif($this->session->userdata('identity')=='owner')
				{
					$id 		= $this->session->userdata('id');
					$recordres 	= $this->getRestaurantByOID($id);
					$rid 		= $recordres['restaurant_id'];
					$recordsprod 	= $this->getProductsByRid($rid);
					$productType 	= [];
					$productType2 	= [];
					if($recordsprod)
					{
						foreach($recordsprod as $num 	=> $attr)
						{
							$productType[$attr['product_type']]		= true;
							$trimProdType 		= str_replace(' ','',$attr['product_type']);
							$productType2[$trimProdType]			= true;
						}
						$productType 	= array_keys($productType);
						$productType2 	= array_keys($productType2);
					}
				}
				$isNew 			= $this->session->flashdata('isNew');
				if($this->input->get_post('id') || (isset($isNew)&&$isNew==false))
				{
					$isNew 		= false;
					$data['product_restaurant_id']	= $record['product_restaurant_id'];
				}
				else
				{
					$isNew 		= true;
					if($this->session->userdata('identity')=='owner')
					{
						$data['product_restaurant_id']	= $rid;
					}
				}
				$this->setSomeFlash('isNew',$isNew);
				$data['isNew']	= $isNew;
				if(isset($record))
				{
					$data['record']	= $record;
					$data['record']['product_type_1']	= str_replace(' ','',$data['record']['product_type']);
				}
				else
					$data['record']	= false;
				if(isset($productType))
				{
					$data['productType']	= $productType;
					$data['productType2']	= $productType2;
				}
				else
				{
					$data['productType']	= [];
					$data['productType2']	= [];
				}
				if($error)
					$data['error']			= $error;
				$this->load->view('template/template',$data);
			}
		}
	}
	
	function getProductsByRid($fk)//foreign key
	{
		$product 	= new $this->product();
		$product->product_restaurant_id 	= $fk;
		$records 	= $product->getListByFK();
		return $records;
	}
	
	function p_productForm()
	{
		$rid 		= $this->input->get_post('txtResId');
		$isExist 	= $this->getDetail('restaurant',$rid);
		if(!$isExist)
		{
			$this->formFail("productForm","The restaurant id do not exists in our database");
		}
		else
		{
			$product 	= new $this->product();
			$id 		= $this->input->get_post('hidID')?$this->input->get_post('hidID'):0;
			$product->product_id 	= $id;
			$product->product_name 	= $this->input->get_post('txtName');
			$product->product_restaurant_id 	= $rid;
			$isExist 	= $product->checkExist();
			if($isExist)
			{
				$this->formFail("productForm","The product name has already been added into this restaurant. Please edit your product information if you wish to update the latest product information.");
			}
			else
			{
				$product->product_type 	= $this->input->get_post('selType');
				$product->product_description 	= $this->input->get_post('txtDesc');
				$product->product_price 	= $this->input->get_post('txtPrice');
				$product->product_discounted_price 	= $this->input->get_post('txtDisPrice');
				$img 			= $this->input->get_post('radImg');
				if($img=='Yes')
				{
					$config 		=
					[
						'upload_path'		=> './uploads/products/',
						'encrypt_name'		=> true,
						'allowed_types'		=> 'gif|jpg|png',
					];
					$this->load->library('upload',$config);
					if(!$this->upload->do_upload('fileImage'))
					{
						$this->formFail('productForm',$this->upload->display_errors());
					}
					else
					{
						$upload_data 	= $this->upload->data();
						$product->product_image_path 	= "uploads/products/".$upload_data['file_name'];
					}
				}
				else
				{
					$product->product_image_path		= $this->input->get_post('hidImg');
				}
				if($this->input->get_post('hidID'))
				{
					if($this->session->userdata('identity')=='owner')
						$product->product_updated_by 	= 0;
					else
						$product->product_updated_by 	= $this->session->userdata('id');
					$product->product_updated_date 		= date('Y-m-d H:i:s');
					$affected_row 	= $product->update();
					if($affected_row)
					{
						$this->setSomeMessage("Information Update Successfully");
						if($this->session->userdata('identity')=='owner')
							redirect("page/restaurant");
						else
							redirect("page/record");
					}
					else
						$this->formFail('productForm','Server Error: Unable to insert record into database. <br />Please try again later or contact admin for help.');
				}
				else
				{
					if($this->session->userdata('identity')=='owner')
						$product->product_created_by 	= 0;
					else
						$product->product_created_by	= $this->session->userdata('id');
					$product->product_created_date		= date('Y-m-d H:i:s');
					$insert_id 		= $product->insert();
					if($insert_id)
					{
						$this->setSomeMessage("Product Added Successfully");
						if($this->session->userdata('identity')=='owner')
							redirect("page/restaurant");
						else
							redirect("page/record");
					}
					else
						$this->formFail('productForm','Server Error: Unable to insert record into database. <br />Please try again later or contact admin for help.');
				}
			}
		}
	}

	function regform02()
	{
		if($this->session->userdata('identity')!='admin')
		{
			$this->setSomeMessage('You do not have enough authority to access this feature. Click OK to redirect back to home page.');
			redirect('page/index');
		}
		else
		{
			$data 	= [
				'identity'		=> $this->session->userdata('identity'),
				'destination'	=> __FUNCTION__ ,
			];
			if($this->session->flashdata('error'))
			{
				$data['error']		= $this->session->flashdata('error');
				$data['retainval']	= $this->session->flashdata('retainval');
			}
			$this->load->view('template/template',$data);
		}
	}
	
	function regform01()
	{
		$data	= [
			'identity'		=> $this->session->userdata('identity'),
			'destination'	=> __FUNCTION__
		];
		if($this->session->flashdata('error'))
		{
			$data['error']		= $this->session->flashdata('error');
			$data['retainval']	= $this->session->flashdata('retainval');
		}
		elseif($this->session->flashdata('error02'))
		{
			$data['error02']	= $this->session->flashdata('error02');
			$data['retainval']	= $this->session->flashdata('retainval');
		}
		$this->load->view('template/template',$data);
	}
	
	function p_register03()
	{
		$admin 				= new $this->admin();
		$admin->admin_email			= $this->input->get_post('txtEmail');
		$isExist			= $admin->checkExist();
		if(!$isExist)
		{
			$admin->admin_name				= $this->input->get_post('txtFstName')." ".$this->input->get_post('txtLstName');
			$admin->admin_pass				= md5($this->input->get_post('txtPass'));
			$admin->admin_created_by		= $this->session->userdata('aid')?$this->session->userdata('aid'):0;
			$admin->admin_created_date		= date('Y-m-d H:i:s');
			$success 			= $admin->insert();
			if($success)
				redirect('page/index');
			else
				$this->formFail('regform01','Server Error: Unable to insert record into database. <br />Please try again later or contact admin for help.');
		}
		else
		{
			$this->formFail('regform02','This email has already been used for another account.');
		}
	}
	
	function registersuccess()
	{
		$data	= [
			'identity'		=> $this->session->userdata('identity'),
			'destination'	=> __FUNCTION__
		];
		$this->load->view('template/template',$data);
	}
	
	function p_register01()
	{
		$customer 		= new $this->customer();
		$customer->customer_email				= $this->input->get_post('txtEmail');
		$isExist		= $customer->checkExist();
		if(!$isExist)
		{
			$customer->customer_name				= $this->input->get_post('txtFstName')." ".$this->input->get_post('txtLstName');
			$customer->customer_gender				= $this->input->get_post('radGender');
			$customer->customer_birth				= $this->input->get_post('txtBirth');
			$customer->customer_contact				= $this->input->get_post('txtCont');
			$customer->customer_address				= $this->input->get_post('txtAddress');
			$customer->customer_state				= $this->input->get_post('selState');
			$customer->customer_zip					= $this->input->get_post('txtZip');
			$customer->customer_sub					= $this->input->get_post('chkSub')?1:0;
			$customer->customer_pass				= md5($this->input->get_post('txtPass'));
			$customer->customer_secure				= md5($this->input->get_post('txtSecure'));
			$customer->customer_status				= "active";
			$customer->customer_status_remark		= "-";
			$customer->customer_created_date		= date('Y-m-d H:i:s');
			$success		= $customer->insert();
			if($success)
			{
				$name = $this->input->get_post('txtFstName')." ".$this->input->get_post('txtLstName');
				$this->setSome('id',$success);
				$this->setSome('identity','customer');
				$this->setSomeMessage("{$name}, thanks for using our website.");
				redirect('page/index');
			}
			else
				$this->formFail('regform01','Server Error: Unable to insert record into database. <br />Please try again later or contact admin for help.',1);	
		}
		else
		{
			$this->formFail('regform01','This email has already been used for another account.',1);
		}
	}
	
	function p_register02()
	{
		$restaurant 		= new $this->restaurant();
		$owner				= new $this->owner();
		$owner->owner_email	= $this->input->get_post('txtEmail02');
		$isExist			= $owner->checkExist();
		if(!$isExist)
		{
			$restaurant->restaurant_address	= $this->input->get_post('txtResAddress02');
			$result		= $restaurant->checkExist();
			if(!$result||$result['restaurant_status']=="unregistered")
			{
				$owner->owner_name			= $this->input->get_post('txtFstName02')." ".$this->input->get_post('txtLstName02');
				$owner->owner_gender		= $this->input->get_post('radGender02');
				$owner->owner_birth			= $this->input->get_post('txtBirth02');
				$owner->owner_contact		= $this->input->get_post('txtCont02');
				$owner->owner_address		= $this->input->get_post('txtAddress02');
				$owner->owner_state			= $this->input->get_post('selState02');
				$owner->owner_zip			= $this->input->get_post('txtZip02');
				$owner->owner_sub			= $this->input->get_post('chkSub02')?1:0;
				$owner->owner_email			= $this->input->get_post('txtEmail02');
				$owner->owner_pass			= md5($this->input->get_post('txtPass02'));
				$owner->owner_secure		= md5($this->input->get_post('txtSecure02'));
				$owner->owner_status		= "pending";
				$owner->owner_status_remark	= "waiting for admin verification";
				$owner->owner_created_date	= date('Y-m-d H:i:s');
				$success			= $owner->insert();
				if($success)
				{
					$restaurant->restaurant_name			= $this->input->get_post('txtResName02');
					$restaurant->restaurant_contact			= $this->input->get_post('txtResCont02');
					$restaurant->restaurant_state			= $this->input->get_post('selResState02');
					$restaurant->restaurant_zip				= $this->input->get_post('txtResZip02');
					$restaurant->restaurant_rating			= 3.00;
					$restaurant->restaurant_status			= "unregistered";
					$restaurant->restaurant_life_status		= "-";
					$restaurant->restaurant_owner_id		= $success;
					$restaurant->restaurant_created_date	= date('Y-m-d H:i:s');
					$success2		= $restaurant->insert();
					if($success2)
					{
						redirect("page/registersuccess");
					}
					else
					{
						$this->formFail("regform01","Server Error: Unable insert record into database. <br />Please try again later or contact admin for help.",2);
					}
				}
				else
				{
					$this->formFail("regform01","Server Error: Unable insert record into database. <br />Please try again later or contact admin for help.",2);
				}
			}
			else
			{
				$this->formFail("regform01","The address of the restaurant has been registered by other owner. <br />Please make sure you key in the address accurately or contact the admin for helps.",2);
			}
		}
		else
		{
			$this->formFail("regform01","This email has already been used for another account.",2);
		}
	}
	
	function formFail($formtype,$error,$formtab = 0)//Needed to Update Frequently
	{
		if($formtype=='regform01')
		{
			if($formtab==1)
			{
				$retainval	= 
				[
					'FstName'	=> $this->input->get_post('txtFstName'),
					'LstName'	=> $this->input->get_post('txtLstName'),
					'Gender'	=> $this->input->get_post('radGender'),
					'Birth'		=> $this->input->get_post('txtBirth'),
					'Cont'		=> $this->input->get_post('txtCont'),
					'Address'	=> $this->input->get_post('txtAddress'),
					'State'		=> $this->input->get_post('selState'),
					'Zip'		=> $this->input->get_post('txtZip'),
					'Email'		=> $this->input->get_post('txtEmail'),
				];
			}
			else
			{
				$retainval	= 
				[
					'FstName02'		=> $this->input->get_post('txtFstName02'),
					'LstName02'		=> $this->input->get_post('txtLstName02'),
					'Gender02'		=> $this->input->get_post('radGender02'),
					'Birth02'		=> $this->input->get_post('txtBirth02'),
					'Cont02'		=> $this->input->get_post('txtCont02'),
					'Address02'		=> $this->input->get_post('txtAddress02'),
					'State02'		=> $this->input->get_post('selState02'),
					'Zip02'			=> $this->input->get_post('txtZip02'),
					'ResName02'		=> $this->input->get_post('txtResName02'),
					'ResCont02'		=> $this->input->get_post('txtResCont02'),
					'ResAddress02'	=> $this->input->get_post('txtResAddress02'),
					'ResState02'	=> $this->input->get_post('selResState02'),
					'ResZip02'		=> $this->input->get_post('txtResZip02'),
					'Email02'		=> $this->input->get_post('txtEmail02'),
				];
				$thing	= ['error02','retainval'];
				$value	= [$error,$retainval];
				$this->setSomeFlash($thing,$value);
			}
		}
		elseif($formtype=='regform02')
		{
			$retainval 			= 
			[
				'FstName'	=> $this->input->get_post('txtFstName'),
				'LstName'	=> $this->input->get_post('txtLstName'),
				'Email'		=> $this->input->get_post('txtEmail'),
			];
		}
		elseif($formtype=='login'||$formtype=='login2')
		{
			$retainval['Email']		= $this->input->get_post('txtEmail');
		}
		elseif($formtype=='ownerForm')
		{
			$retainval		=
			[
				'owner_id'	=> $this->input->get_post('hidID'),
				'owner_name'	=> $this->input->get_post('txtName'),
				'owner_gender'	=> $this->input->get_post('radGender'),
				'owner_birth'	=> $this->input->get_post('txtBirth'),
				'owner_contact'	=> $this->input->get_post('txtAddress'),
				'owner_address'	=> $this->input->get_post('owner_address'),
				'owner_state'	=> $this->input->get_post('selState'),
				'owner_zip'		=> $this->input->get_post('txtZip'),
				'owner_sub'		=> $this->input->get_post('chkSub')?1:0,
				'owner_email'	=> $this->input->get_post('txtEmail'),
				'owner_status'	=> $this->input->get_post('selStatus'),
				'owner_status_remark'	=> $this->input->get_post('txtStatusRe'),
			];
		}
		elseif($formtype=='restaurantForm')
		{
			$retainval		=
			[
				'restaurant_id'			=> $this->input->get_post('hidID'),
				'restaurant_address'	=> $this->input->get_post('txtAddress'),
				'restaurant_name'		=> $this->input->get_post('txtName'),
				'restaurant_contact'	=> $this->input->get_post('txtCont'),
				'restaurant_state'		=> $this->input->get_post('selState'),
				'restaurant_zip'		=> $this->input->get_post('txtZip'),
				'restaurant_title'		=> $this->input->get_post('txtTitle'),
				'restaurant_description'		=> $this->input->get_post('txtDesc'),
				'restaurant_business_day'		=> $this->session->flashdata('businessDay'),
				'restaurant_business_hour'		=> $this->session->flashdata('daystring'),
				'restaurant_deliver_fee'		=> $this->input->get_post('txtDeliFee'),
				'restaurant_deliver_coverage'		=> $this->input->get_post('txtDeliCov'),
				'restaurant_deliver_minimum_order'		=> $this->input->get_post('txtDeliMin'),
				'restaurant_deliver_time'		=> $this->input->get_post('txtDeliHours').":".$this->input->get_post('txtDeliMins').":00",
				'restaurant_cod'					=> $this->input->get_post('radCOD')=='Yes'?1:0,
				'restaurant_status'		=> $this->input->get_post('hidSta'),
			];
		}
		elseif(substr($formtype,0,8)=='checkout')
		{
			$retainval 			= 
			[
				'cartItem'		=> $this->session->flashdata('cartItem'),
				'restaurant_id'		=> $this->session->flashdata('restaurant_id'),
				'restaurant_deliver_fee'		=> $this->session->flashdata('restaurant_deliver_fee'),
			];
		}
		elseif($formtype=='customerForm')
		{
			$retainval 			= 
			[
				'customer_status'				=> $this->input->get_post('hidID'),
				'customer_status_remark'				=> $this->input->get_post('hidID'),
				'customer_name'				=> $this->input->get_post('txtName'),
				'customer_gender'				=> $this->input->get_post('radGender'),
				'customer_birth'				=> $this->input->get_post('txtBirth'),
				'customer_contact'				=> $this->input->get_post('txtCont'),
				'customer_address'				=> $this->input->get_post('txtAddress'),
				'customer_state'				=> $this->input->get_post('selState'),
				'customer_zip'				=> $this->input->get_post('txtZip'),
				'customer_sub'				=> $this->input->get_post('chkSub'),
			];
		}
		elseif($formtype=='productForm')
		{
			$retainval 		= 
			[
				'product_id'				=> $this->input->get_post('hidID'),
				'product_image_path'		=> $this->input->get_post('hidImg'),
				'product_name'				=> $this->input->get_post('txtName'),
				'product_type'				=> $this->input->get_post('selType'),
				'product_price'				=> $this->input->get_post('txtPrice'),
				'product_discounted_price'	=> $this->input->get_post('txtDisPrice'),
				'product_description'		=> $this->input->get_post('txtDesc'),
				'product_restaurant_id'		=> $this->input->get_post('txtResId'),
			];
		}
		elseif($formtype=='forgetPassword')
		{
			$retainval	=
			[
				'email'	=> $this->input->get_post('txtEmail'),
			];
		}
		if($formtab!=2)
		{
			$thing	= ['error','retainval'];
			$value	= [$error,$retainval];
			$this->setSomeFlash($thing,$value);
		}
		redirect("page/{$formtype}");
	}
	
	//test function end

	//logic/db control function
	
	function setSome($thing,$value)//If want to set a single variable to an array of value, please set in into an array of variable. Eg. $thing = [null,'abc']; $value = [null,$array]; 
	{
		if(!is_array($thing) && !is_array($thing))
		{
			$this->session->set_userdata($thing,$value);
		}
		elseif(is_array($thing) && is_array($value))
		{
			if(count($thing)==count($value))
				for($i=0;$i<count($thing);$i++)
					$this->session->set_userdata($thing[$i],$value[$i]);
			else
				die("Error occured in function ". __FUNCTION__ .": The length of key and its corresponding are not same. ");
		}
		else
		{	
			if(!is_array($thing))
				die("Error occured in function ". __FUNCTION__ .": Key is not an array while its value is an array. ");
			else
				die("Error occured in function ". __FUNCTION__ .": Value is not an array while its key is an array. ");
		}
	}
	
	function setSomeFlash($thing,$value) 
	{
		if(!is_array($thing) && !is_array($thing))
		{
			$this->session->set_flashdata($thing,$value);
		}
		elseif(is_array($thing) && is_array($value))
		{
			if(count($thing)==count($value))
				for($i=0;$i<count($thing);$i++)
					$this->session->set_flashdata($thing[$i],$value[$i]);
			else
				die("Error occured in function ". __FUNCTION__ .": The length of key and its corresponding are not same. Reference : {$thing[0]} => {$value[0]}");
		}
		else
		{	
			if(!is_array($thing))
				die("Error occured in function ". __FUNCTION__ .": Key is not an array while its value is an array. Reference : {$thing} => {$value[0]}");
			else
				die("Error occured in function ". __FUNCTION__ .": Value is not an array while its key is an array. Reference : {$thing[0]} => {$value}");
		}
	}
	
	function unsetSome($thing)
	{
		if(!is_array($thing))
			$this->session->unset_userdata($thing);
		else
			foreach($thing as $num => $data)
				$this->session->unset_userdata($data);
	}
	
	//logic/db control function end
	
	//added page function
	
	//added page function end
	
	//template function
	
	function about()
	{
		$data	= [
			'identity'	=> $this->session->userdata('identity'),
			'destination'	=> __FUNCTION__
		];
		$this->load->view('template/template',$data);
	}
	
	function beverages()
	{
		$data	= [
			'identity'	=> $this->session->userdata('identity'),
			'destination'	=> __FUNCTION__
		];
		$this->load->view('template/template',$data);
	}
	
	function checkout()
	{
		if(!$this->input->get_post('hidCt'))
		{
			$this->setSomeMessage("Invalid URL");
			redirect('page/index');
		}
		else
		{
			$data	= [
				'identity'	=> $this->session->userdata('identity'),
				'destination'	=> __FUNCTION__
			];
			$error 	= $this->session->flashdata('error');
			if($error)
			{
				$retainval 						= $this->session->flashdata('retainval');
				$data['cartItem']				= $retainval['cartItem'];
				$data['restaurant_id']			= $retainval['restaurant_id'];
				$data['restaurant_deliver_fee']	= $retainval['restaurant_deliver_fee'];
				$data['error']					= $error;
				$this->load->view('template/template',$data);
			}
			else
			{
				$ct 	= $this->input->get_post('hidCt');
				for($i=0;$i<$ct;$i++)
				{
					$data['cartItem'][$i]		=
					[
						'cart_product_id'		=> $this->input->get_post("cartID_{$i}"),
						'cart_product_name'		=> $this->input->get_post("cartName_{$i}"),
						'cart_product_price'	=> $this->input->get_post("cartPrice_{$i}"),
						'cart_product_quantity'	=> $this->input->get_post("cartQty_{$i}"),
						'cart_product_total'	=> $this->input->get_post("cartTot_{$i}"),
					];
				}
				foreach($data['cartItem'] as $num => $attr)
				{
					$prodRecord 		= $this->getDetail("product",$attr['cart_product_id']);
					$data['cartItem'][$num]['cart_product_url'] 	= $prodRecord['product_image_path'];
				}
				$rid 			= $prodRecord['product_restaurant_id'];
				$resRecord 		= $this->getDetail("restaurant",$rid);
				$data['restaurant_cod']				= $resRecord['restaurant_cod'];
				$data['restaurant_id']				= $resRecord['restaurant_id'];
				$data['restaurant_deliver_fee']		= $resRecord['restaurant_deliver_fee'];
				$data['restaurant_cod']				= $resRecord['restaurant_cod'];
				$this->load->view('template/template',$data);
			}
		}
	}
	
	function p_checkout()
	{
		$maxct 		= $this->input->get_post("hidCt");
		if(!$maxct)
		{
			$this->setSomeMessage("Invalid URL");
			redirect("page/index");
		}
		else
		{
			$secure 					= $this->input->get_post("txtSecure");
			$customer					= new $this->customer();
			$customer->customer_id		= $this->session->userdata("id");
			$customer->customer_secure	= md5($secure);
			$isTrue						= $customer->checkSecure();
			if($isTrue)
			{
				$truect 				= 0;
				$gt 					= 0;
				$order 					= new $this->order();
				$dataInsertToBridge		= [];
				for($i=0;$i<$maxct;$i++)
				{
					if($this->input->get_post("basId_{$i}"))
					{
						$pid 			= $this->input->get_post("basId_{$i}");
						$prodRecord 	= $this->getDetail("product",$pid);
						$dataInsertToBridge[$truect] 	=
						[
							'productorder_product_id'		=> $pid,
							'productorder_quantity'			=> $this->input->get_post("basQty_{$i}"),
							'productorder_product_price'	=> $prodRecord['product_discounted_price'],
							'productorder_totprice'			=> floatval($this->input->get_post("basQty_{$i}")*$prodRecord['product_discounted_price']),
						];
						$gt 		+= $dataInsertToBridge[$truect]['productorder_totprice'];
						$truect++;
					}
					else
						continue;
				}
				$address 			= $this->input->get_post('radAddress');
				if($address == "Default Address")
				{
					$custRecord 		= $this->getDetail("customer",$this->session->userdata('id'));
					$order->order_delivery_address	= $custRecord['customer_address'];
				}
				else
				{
					$order->order_delivery_address	= $this->input->get_post('txtAddress');
				}
				$gt 	+= $this->input->get_post('basDel');
				$order->order_delivery_fee				= $this->input->get_post('basDel');
				$order->order_product_type_amount 		= $truect;
				$order->order_restaurant_id				= $prodRecord['product_restaurant_id'];
				$order->order_payment_method			= $this->input->get_post('radPayMeth');
				$order->order_grand_total				= $gt;
				$order->order_created_by				= $this->session->userdata('id');
				$order->order_created_date				= date('Y-m-d H:i:s');
				$rid 		= $prodRecord['product_restaurant_id'];
				$insert_id 		= $order->insert();
				if(!$insert_id)
				{
					$this->setSomeMessage("Server Error: Unable to insert record into database. Please try to order again later or contact admin for help.");
					redirect("page/restaurant?id={$rid}");
				}
				else
				{
					for($i=0;$i<$truect;$i++)
					{
						$productorder 		= new $this->productorder();
						$productorder->productorder_order_id	= $insert_id;
						$productorder->productorder_product_id	= $dataInsertToBridge[$i]['productorder_product_id'];
						$productorder->productorder_quantity	= $dataInsertToBridge[$i]['productorder_quantity'];
						$productorder->productorder_product_price	= $dataInsertToBridge[$i]['productorder_product_price'];
						$productorder->productorder_totprice	= $dataInsertToBridge[$i]['productorder_totprice'];
						$bridge_insert_id		= $productorder->insert();
						if(!$bridge_insert_id)
							$i=$truect*2;
					}
					if($i>$truect)
					{
						$this->setSomeMessage("Server Error: Unable to insert record into database. Please try to order again later or contact admin for help.");
						redirect("page/restaurant?id={$rid}");
					}
					else
					{
						if($this->input->get_post('radPayMeth')=='cash_on_delivery')
						{
							$this->setSomeMessage("You order has been placed.");
							redirect("page/customerOrder");
						}
						else
						{
							$money 			= $this->session->userdata('ewallet');
							$money 			-= $gt;
							$customer 		= new $this->customer();
							$customer->customer_id					= $this->session->userdata('id');
							$customer->customer_balance				= $money;
							$customer->customer_updated_by			= 0;
							$customer->customer_updated_date		= date('Y-m-d H:i:s');
							$affected_row 	= $customer->updatewallet();
							if(!$affected_row)
							{
								$this->setSomeMessage("Server Error: Unable to update record into database. Please try to order again later or contact admin for help.");
								redirect("page/restaurant?id={$rid}");
							}
							else
							{
								$rid 			= $prodRecord['product_restaurant_id'];
								$resRecord		= $this->getDetail("restaurant",$rid);
								$rmoney 		= $resRecord['restaurant_balance'];
								$rmoney 		+= $gt;
								$restaurant		= new $this->restaurant();
								$restaurant->restaurant_id 				= $prodRecord['product_restaurant_id'];
								$restaurant->restaurant_balance			= $rmoney;
								$customer->restaurant_updated_by		= 0;
								$customer->restaurant_updated_date		= date('Y-m-d H:i:s');
								$affected_row	= $restaurant->updatewallet();
								if(!$affected_row)
								{
									$this->setSomeMessage("Server Error: Unable to update record into database. Please try to order again later or contact admin for help.");
									redirect("page/restaurant?id={$rid}");
								}
								else
								{
									$this->setSomeMessage("You order has been placed.");
									redirect("page/customerOrder");
								}
							}
						}
					}
				}
			}
			else
			{
				$truect 				= 0;
				$gt 					= 0;
				$newCart				= [];
				for($i=0;$i<$maxct;$i++)
				{
					if($this->input->get_post("basId_{$i}"))
					{
						$pid 			= $this->input->get_post("basId_{$i}");
						$prodRecord 	= $this->getDetail("product",$pid);
						$newCart[$truect] 	=
						[
							'cart_product_id'				=> $pid,
							'cart_product_name'				=> $prodRecord['product_name'],
							'cart_product_price'			=> $prodRecord['product_discounted_price'],
							'cart_product_quantity'			=> $this->input->get_post("basQty_{$i}"),
							'cart_product_total'			=> floatval($this->input->get_post("basQty_{$i}")*$prodRecord['product_discounted_price']),
							'cart_product_url'				=> $prodRecord['product_image_path'],
						];
						$truect++;
					}
					else
						continue;
				}
				$rid 			= $prodRecord['product_restaurant_id'];
				$resRecord 		= $this->getDetail("restaurant",$rid);
				$restaurant_deliver_fee		= $resRecord['restaurant_deliver_fee'];
				$thing 			= ['cartItem','restaurant_id','restaurant_deliver_fee'];
				$value 			= [$newCart,$rid,$restaurant_deliver_fee];
				$this->setSomeFlash($thing,$value);
				$this->formFail("checkout?hidCt={$truect}","Incorrect Secure Code");
			}
		}
	}
	
	function customerOrder()
	{
		if($this->session->userdata('identity')!='customer')
		{
			$this->setSomeMessage("You do not have enough authority to access this feature. Click OK to redirect back to home page.");
			redirect("page/index");
		}
		else
		{
			$data 	= [
				'identity'		=> $this->session->userdata('identity'),
				'destination'	=> __FUNCTION__
			];
			$order 			= new $this->order();
			$order->order_created_by 		= $this->session->userdata('id');
			$recordsOrder 					= $order->getListByCID();
			$groupedArray					= [];
			if($recordsOrder)
			{
				foreach($recordsOrder as $num	=> $attrarray)
				{
					$groupedArray[$num]['order_detail']		= $attrarray;
					$oid 			= $attrarray['order_id'];
					$rid 			= $attrarray['order_restaurant_id'];
					$recordres		= $this->getDetail("restaurant",$rid);
					$groupedArray[$num]['order_detail']['restaurant_name']	= $recordres['restaurant_name'];
					$productorder 	= new $this->productorder();
					$productorder->productorder_order_id		= $oid;
					$recordsProdOr	= $productorder->getListByOID();
					foreach($recordsProdOr as $num2 => $record)
					{
						$recordProduct 		= $this->getDetail("product",$record['productorder_product_id']);
						if(is_array($recordProduct))
							$groupedArray[$num]['product_detail'][$num2]		= array_merge($recordsProdOr[$num2],$recordProduct);
						else
						{
							$groupedArray[$num]['product_detail'][$num2]	= $recordsProdOr[$num2];
							$groupedArray[$num]['product_detail'][$num2]['product_id']	=	"product record has been deleted.";
							$groupedArray[$num]['product_detail'][$num2]['product_name']	=	"product record has been deleted.";
							$groupedArray[$num]['product_detail'][$num2]['product_type']	=	"product record has been deleted.";
							$groupedArray[$num]['product_detail'][$num2]['product_price']	=	"product record has been deleted.";
							$groupedArray[$num]['product_detail'][$num2]['product_discounted_price']	=	"product record has been deleted.";
							$groupedArray[$num]['product_detail'][$num2]['product_description']	=	"product record has been deleted.";
							$groupedArray[$num]['product_detail'][$num2]['product_image_path']	=	"product record has been deleted.";
							$groupedArray[$num]['product_detail'][$num2]['product_restaurant_id']	=	"product record has been deleted.";
							$groupedArray[$num]['product_detail'][$num2]['product_created_by']	=	"product record has been deleted.";
							$groupedArray[$num]['product_detail'][$num2]['product_created_date']	=	"product record has been deleted.";
							$groupedArray[$num]['product_detail'][$num2]['product_updated_by']	=	"product record has been deleted.";
							$groupedArray[$num]['product_detail'][$num2]['product_updated_date']	=	"product record has been deleted.";
						}
					}
				}
				$groupedArray		= $this->sortOrderArray($groupedArray);
			}
			else
				$groupedArray			= [];
			$data['records']		= $groupedArray;
			$this->load->view('template/template',$data);
		}
	}
	
	function topuplist()
	{
		$data 	= [
			'identity'		=> $this->session->userdata('identity'),
			'destination'	=> __FUNCTION__
		];
		$topup 		= new $this->topup();
		$topup->topup_created_by	= $this->session->userdata('id');
		$records 	= $topup->getListByCID();
		if(!$records)
			$records	= [];
		$data['records']		= $records;
		$data['pk']				= "topup_id";
		$this->load->view('template/template',$data);
	}
	
	function cancelOrder()
	{
		$id 	= $this->input->get_post('id')?$this->input->get_post('id'):$this->session->userdata('request_id');
		if($this->session->userdata('request_id'))
			$this->session->unset_userdata('request_id');
		if(!$id)
		{
			$this->setSomeMessage("Invalid URL");
			redirect("page/index");
		}
		else
		{
			$reason 		= $this->session->userdata('reason');
			if(!$reason)
			{
				$this->setSome('prevdest',"cancelOrder");
				$this->setSome('request_id',$id);
				redirect("page/promptreason");
			}
			else
			{
				$this->session->unset_userdata('reason');
				$order 	= new $this->order();
				$order->order_id 				= $id;
				$order->order_status_remark		= $reason;
				$order->order_closed_by 		= 0;
				$order->order_closed_date 		= date('Y-m-d H:i:s');
				$affected_row 	= $order->cancel();
				if(!$affected_row)
				{
					$this->setSomeMessage("Server Error: Unable to update record into database. Please try to order again later or contact admin for help.");
					redirect("page/customerOrder");
				}
				else
				{
					$money 			= $this->session->userdata('ewallet');
					$recordOrder	= $this->getDetail("order",$id);
					$money 			+= $recordOrder['order_grand_total'];
					$customer 		= new $this->customer();
					$customer->customer_id 			= $this->session->userdata('id');
					$customer->customer_balance 	= $money;
					$customer->customer_updated_by	= 0;
					$customer->customer_updated_date	= date('Y-m-d H:i:s');
					$affected_row 	= $customer->updatewallet();
					if(!$affected_row)
					{
						$this->setSomeMessage("Server Error: Unable to update record into database. Please try to order again later or contact admin for help.");
						redirect("page/customerOrder");
					}
					else
					{
						$recordRes 		= $this->getDetail("restaurant",$recordOrder['order_restaurant_id']);
						$rmoney 		= $recordRes['restaurant_balance'];
						$rmoney 		-= $recordOrder['order_grand_total'];
						$restaurant 	= new $this->restaurant();
						$restaurant->restaurant_id			= $recordOrder['order_restaurant_id'];
						$restaurant->restaurant_balance		= $rmoney;
						$restaurant->restaurant_updated_by	= 0;
						$restaurant->restaurant_updated_date	= date('Y-m-d H:i:s');
						$affected_row 	= $restaurant->updatewallet();
						if($affected_row)
						{
							$this->setSomeMessage("Order successfully canceled");
							redirect("page/customerOrder");
						}
						else
						{
							$this->setSomeMessage("Server Error: Unable to update record into database. Please try to order again later or contact admin for help.");
							redirect("page/customerOrder");
						}
					}					
				}
			}
		}
	}
	
	function promptsecure()
	{
		if($this->session->userdata('identity')=='unregistered' || $this->session->userdata('identity')=='admin')
		{
			$this->setSomeMessage("You do not have enough authority to access this page. Click OK to redirect back to home page.");
			redirect("page/index");
		}
		$data 	= [
			'identity'		=> $this->session->userdata('identity'),
			'destination'	=> __FUNCTION__
		];
		$this->load->view('template/template',$data);
	}
	
	function p_promptsecure()
	{
		/*
		$checked 		= $this->session->flashdata('checked');
		if($this->session->userdata('identity')=='owner' && !$checked)
		{
			$id		= $this->input->get_post('id');
			if($id)
				$appString 		= "?id={$id}";
			else
				$appString		= "";
			$this->setSome('prevdest',"productForm{$appString}");
			redirect("page/promptsecure");
		}
		*/
		$secure 		= md5($this->input->get_post('txtSecure'));
		$identity		= $this->session->userdata('identity');
		if($identity == 'owner')
		{
			$object 		= new $this->owner();
			$object->owner_id		= $this->session->userdata('id');
			$object->owner_secure	= $secure;
		}
		else
		{
			$object 		= new $this->customer();
			$object->customer_id		= $this->session->userdata('id');
			$object->customer_secure	= $secure;
		}
		$isTrue		= $object->checkSecure();
		if($isTrue)
		{
			$this->setSomeFlash('checked',1);
			$prevdest		= $this->session->userdata('prevdest');
			$this->session->unset_userdata('prevdest');
			redirect("page/".$prevdest);
		}
		else
		{
			$this->setSomeMessage("Invalid Secure Code, Access Is Denied");
			redirect("page/index");
		}
	}
	
	function ownerOrder()
	{
		if($this->session->userdata('identity')!='owner')
		{
			$this->setSomeMessage("You do not have enough authority to access this page. Click OK to redirect back to home page.");
			redirect("page/index");
		}
		else
		{
			$data 	= [
				'identity'		=> $this->session->userdata('identity'),
				'destination'	=> __FUNCTION__
			];
			$restaurant 	= new $this->restaurant();
			$restaurant->restaurant_owner_id		= $this->session->userdata('id');
			$recordRes 		= $restaurant->getDetailByFK();
			$rid 			= $recordRes['restaurant_id'];
			$order 			= new $this->order();
			$order->order_restaurant_id		= $rid;
			$recordsOrder	= $order->getListByRID();
			$groupedArray	= [];
			if($recordsOrder)
			{
				foreach($recordsOrder as $num	=> $attrarray)
				{
					$oid 			= $attrarray['order_id'];
					$cid 			= $attrarray['order_created_by'];
					$recordCust		= $this->getDetail("customer",$cid);
					$groupedArray[$num]['order_detail']		= array_merge($attrarray,$recordCust);
					$productorder 	= new $this->productorder();
					$productorder->productorder_order_id		= $oid;
					$recordsProdOr	= $productorder->getListByOID();
					foreach($recordsProdOr as $num2 => $record)
					{
						$recordProduct 		= $this->getDetail("product",$record['productorder_product_id']);
						if(is_array($recordProduct))
							$groupedArray[$num]['product_detail'][$num2]		= array_merge($recordsProdOr[$num2],$recordProduct);
						else
						{
							$groupedArray[$num]['product_detail'][$num2]	= $recordsProdOr[$num2];
							$groupedArray[$num]['product_detail'][$num2]['product_id']	=	"product record has been deleted.";
							$groupedArray[$num]['product_detail'][$num2]['product_name']	=	"product record has been deleted.";
							$groupedArray[$num]['product_detail'][$num2]['product_type']	=	"product record has been deleted.";
							$groupedArray[$num]['product_detail'][$num2]['product_price']	=	"product record has been deleted.";
							$groupedArray[$num]['product_detail'][$num2]['product_discounted_price']	=	"product record has been deleted.";
							$groupedArray[$num]['product_detail'][$num2]['product_description']	=	"product record has been deleted.";
							$groupedArray[$num]['product_detail'][$num2]['product_image_path']	=	"product record has been deleted.";
							$groupedArray[$num]['product_detail'][$num2]['product_restaurant_id']	=	"product record has been deleted.";
							$groupedArray[$num]['product_detail'][$num2]['product_created_by']	=	"product record has been deleted.";
							$groupedArray[$num]['product_detail'][$num2]['product_created_date']	=	"product record has been deleted.";
							$groupedArray[$num]['product_detail'][$num2]['product_updated_by']	=	"product record has been deleted.";
							$groupedArray[$num]['product_detail'][$num2]['product_updated_date']	=	"product record has been deleted.";
						}
					}
				}
			}
			else
				$groupedArray		= [];
			if($groupedArray)
			{
				$groupedArray 	= $this->sortOrderArray($groupedArray);
			}
			$data['records']		= $groupedArray;
			$data['restaurant_life_status']		= $recordRes['restaurant_life_status'];
			$this->load->view('template/template',$data);
		}
	}
	
	function changeStatus()
	{
		$status 		= $this->input->get_post('selStatus');
		if($this->session->userdata('identity')!='owner' || !$status)
		{
			$this->setSomeMessage("Invalid URL");
			redirect("page/index");
		}
		else
		{
			$restaurant 	= new $this->restaurant();
			$restaurant->restaurant_life_status		= $status;
			$restaurant->restaurant_owner_id		= $this->session->userdata('id');
			$affected_row 		= $restaurant->changelivestatus();
			if($affected_row)
			{
				redirect("page/ownerOrder");
			}
			else
			{
				$this->setSomeMessage("Server Error: Unable to update record into database. Please try to order again later or contact admin for help.");
				redirect("page/ownerOrder");
			}
		}
		
	}
	
	function sortOrderArray($groupedArray)
	{
		foreach($groupedArray as $num => $detail)
		{
			if($detail['order_detail']['order_closed_date']!='0000-00-00 00:00:00')
				$referArray[]		=  $detail['order_detail']['order_closed_date'];
			elseif($detail['order_detail']['order_updated_date']!='0000-00-00 00:00:00')
				$referArray[]		=  $detail['order_detail']['order_updated_date'];
			else
				$referArray[]		=  $detail['order_detail']['order_created_date'];
		}
		array_multisort($referArray,$groupedArray);
		$groupedArray		= array_reverse($groupedArray);
		return $groupedArray;
	}
	
	function acceptOrder()
	{
		$id 	= $this->input->get_post('id');
		if(!$id)
		{
			$this->setSomeMessage("Invalid URL");
			redirect("page/index");
		}
		else
		{
			$order 	= new $this->order();
			$order->order_id 				= $id;
			$order->order_updated_by 		= 0;
			$order->order_updated_date 		= date('Y-m-d H:i:s');
			$affected_row 	= $order->accept();
			if(!$affected_row)
			{
				$this->setSomeMessage("Server Error: Unable to update record into database. Please try to order again later or contact admin for help.");
				redirect("page/ownerOrder");
			}
			else
			{
				redirect("page/ownerOrder");
			}
		}
	}
	
	function declineOrder()
	{
		$id 	= $this->input->get_post('id')?$this->input->get_post('id'):$this->session->userdata('request_id');
		if($this->session->userdata('request_id'))
			$this->session->unset_userdata('request_id');
		if(!$id)
		{
			$this->setSomeMessage("Invalid URL");
			redirect("page/index");
		}
		else
		{
			$reason 		= $this->session->userdata('reason');
			if(!$reason)
			{
				$this->setSome('prevdest',"declineOrder");
				$this->setSome('request_id',$id);
				redirect("page/promptreason");
			}
			else
			{
				$this->session->unset_userdata('reason');
				$order 	= new $this->order();
				$order->order_id 				= $id;
				$order->order_status_remark		= $reason;
				$order->order_closed_by 		= 0;
				$order->order_closed_date 		= date('Y-m-d H:i:s');
				$affected_row 	= $order->decline();
				if(!$affected_row)
				{
					$this->setSomeMessage("Server Error: Unable to update record into database. Please try to order again later or contact admin for help.");
					redirect("page/ownerOrder");
				}
				else
				{
					$recordOrder 	= $this->getDetail("order",$id);
					if($recordOrder['order_payment_method']=='cash_on_delivery')
					{
						redirect("page/ownerOrder");
					}
					else
					{
						$money 			= $this->session->userdata('resbal');
						$recordOrder	= $this->getDetail("order",$id);
						$money 			-= $recordOrder['order_grand_total'];
						$restaurant 	= new $this->restaurant();
						$restaurant->restaurant_owner_id			= $this->session->userdata('id');
						$restaurant->restaurant_balance				= $money;
						$restaurant->restaurant_updated_by			= 0;
						$restaurant->restaurant_updated_date		= date('Y-m-d H:i:s');
						$affected_row 	= $restaurant->updatewallet2();
						if(!$affected_row)
						{
							$this->setSomeMessage("Server Error: Unable to update record into database. Please try to order again later or contact admin for help.");
							redirect("page/ownerOrder");
						}
						else
						{
							$recordCust 		= $this->getDetail("customer",$recordOrder['order_created_by']);
							$cmoney 		= $recordCust['customer_balance'];
							$cmoney 		+= $recordOrder['order_grand_total'];
							$customer 		= new $this->customer();
							$customer->customer_id 			= $recordOrder['order_created_by'];
							$customer->customer_balance 	= $money;
							$customer->customer_updated_by	= 0;
							$customer->customer_updated_date= date('Y-m-d H:i:s');
							$affected_row 	= $customer->updatewallet();
							if($affected_row)
							{
								redirect("page/ownerOrder");
							}
							else
							{
								$this->setSomeMessage("CUSTServer Error: Unable to update record into database. Please try to order again later or contact admin for help.");
								redirect("page/ownerOrder");
							}
						}
					}
				}
			}
			
		}
	}
	
	function completeOrder()
	{
		$id 	= $this->input->get_post('id');
		if(!$id)
		{
			$this->setSomeMessage("Invalid URL");
			redirect("page/index");
		}
		else
		{
			$order 	= new $this->order();
			$order->order_id 				= $id;
			$order->order_closed_by			= 0;
			$order->order_closed_date 		= date('Y-m-d H:i:s');
			$affected_row 	= $order->complete();
			if(!$affected_row)
			{
				$this->setSomeMessage("Server Error: Unable to update record into database. Please try to order again later or contact admin for help.");
				redirect("page/ownerOrder");
			}
			else
			{
				redirect("page/ownerOrder");
			}
		}
	}
	
	function redeem()
	{
		if($this->session->userdata('identity')!='owner')
		{
			$this->setSomeMessage("You do not have enough authority to access this feature. Click OK to redirect back to home page.");
			redirect('page/index');	
		}
		else
		{
			$checked 		= $this->session->flashdata('checked');
			if($this->session->userdata('identity')=='owner' && !$checked)
			{
				$this->setSome('prevdest',"redeem");
				redirect("page/promptsecure");
			} 
			else
			{
				$data	= [
					'identity'	=> $this->session->userdata('identity'),
					'destination'	=> __FUNCTION__
				];
				$this->load->view('template/template',$data);
			}
		}
	}
	
	function p_redeem()
	{
		
		if($this->input->get_post('txtAmount')>$this->session->userdata('resbal'))
		{
			$this->setSomeMessage("Your withdraw amount has exceed the account limit");
			redirect("page/index");
		}
		else
		{
			$bank	= ['Maybank','CIMB Bank','Public Bank','RHB Bank','Hong Leong Bank','AmBank'];
			$redeem 	= new $this->redeem();
			$redeem->redeem_amount						= $this->input->get_post('txtAmount');
			$redeem->redeem_bank_name					= $bank[$this->input->get_post('selBank')-1];
			$redeem->redeem_bank_account_number			= $this->input->get_post('txtBankAccountNumber');
			$redeem->redeem_bank_account_name			= $this->input->get_post('txtBankAccountName');
			$resRecord 		= $this->getRestaurantByOID($this->session->userdata('id'));
			$redeem->redeem_created_by					= $resRecord['restaurant_id'];//restaurant id
			$redeem->redeem_created_date				= date('Y-m-d H:i:s');
			$insert_id 		= $redeem->insert();
			if($insert_id)
			{
				$this->setSomeMessage("Redemption request made. Please wait for admin acceptance. Your restaurant balance will automatically deducted once the request has been processed.");
				redirect("page/index");
			}
			else
			{
				$this->setSomeMessage("Server Error: Unable to insert record into database. Please try again later or contact admin for help.");
				redirect("page/index");
			}
		}
		
	}
	
	function promptreason()
	{
		if(!$this->session->userdata('prevdest'))
		{
			$this->setSomeMessage("Invalid URL");
			redirect("page/index");
		}
		else
		{
			$array 		= 
			[
				'customer'		=> 'Order Cancellation',
				'owner'			=> 'Order Declination',
				'admin'			=> 'Redeem Declination',
			];
			$data 	= [
				'identity'		=> $this->session->userdata('identity'),
				'destination'	=> __FUNCTION__,
				'action'		=> $array[$this->session->userdata('identity')],
			];
			$this->load->view('template/template',$data);
		}
	}
	
	function p_promptreason()
	{
		$reason 		= $this->input->get_post('txtReason');
		$this->setSome('reason',$reason);
		$prevdest		= $this->session->userdata('prevdest');
		$this->session->unset_userdata('prevdest');
		redirect("page/".$prevdest);
	}
	
	function contact()
	{
		$data	= [
			'identity'	=> $this->session->userdata('identity'),
			'destination'	=> __FUNCTION__
		];
		$this->load->view('template/template',$data);
	}
	
	function faq()
	{
		$data	= [
			'identity'	=> $this->session->userdata('identity'),
			'destination'	=> __FUNCTION__
		];
		$this->load->view('template/template',$data);
	}
	
	function gourmet()
	{
		$data	= [
			'identity'	=> $this->session->userdata('identity'),
			'destination'	=> __FUNCTION__
		];
		$this->load->view('template/template',$data);
	}
	
	function groceries()
	{
		$data	= [
			'identity'	=> $this->session->userdata('identity'),
			'destination'	=> __FUNCTION__
		];
		$this->load->view('template/template',$data);
	}
	
	function household()
	{
		$data	= [
			'identity'	=> $this->session->userdata('identity'),
			'destination'	=> __FUNCTION__
		];
		$this->load->view('template/template',$data);
	}
	
	function index()
	{
		$records 	= $this->getList("restaurant");
		if(count($records)>18)
		{
			$records 	= array_slice($records,0,18);
		}
		$data	= [
			'identity'		=> $this->session->userdata('identity'),
			'destination'	=> __FUNCTION__,
			'records'		=> $records?$records:false
		];
		$this->load->view('template/template',$data);
	}
	
	function offers()
	{
		$data	= [
			'identity'	=> $this->session->userdata('identity'),
			'destination'	=> __FUNCTION__
		];
		$this->load->view('template/template',$data);
	}
	
	function packagedfoods()
	{
		$data	= [
			'identity'	=> $this->session->userdata('identity'),
			'destination'	=> __FUNCTION__
		];
		$this->load->view('template/template',$data);
	}
	
	function personalcare()
	{
		$data	= [
			'identity'	=> $this->session->userdata('identity'),
			'destination'	=> __FUNCTION__
		];
		$this->load->view('template/template',$data);
	}
	
	function products()
	{
		$data	= [
			'identity'	=> $this->session->userdata('identity'),
			'destination'	=> __FUNCTION__
		];
		$this->load->view('template/template',$data);
	}
	
	function registered()
	{
		$data	= [
			'identity'	=> $this->session->userdata('identity'),
			'destination'	=> __FUNCTION__
		];
		$this->load->view('template/template',$data);
	}
	
	function shortcodes()
	{
		$data	= [
			'identity'	=> $this->session->userdata('identity'),
			'destination'	=> __FUNCTION__
		];
		$this->load->view('template/template',$data);
	}
	
	function single()
	{
		$data	= [
			'identity'	=> $this->session->userdata('identity'),
			'destination'	=> __FUNCTION__
		];
		$this->load->view('template/template',$data);
	}
	
	function restaurant_browser()
	{
		$data	= [
			'identity'	=> $this->session->userdata('identity'),
			'destination'	=> __FUNCTION__
		];
		$records 	= $this->getList("restaurant");
		$data['records']	= $records;
		$this->load->view('template/template',$data);
	}
	
	function policy()
	{
		$data	= [
			'identity'	=> $this->session->userdata('identity'),
			'destination'	=> __FUNCTION__
		];
		$this->load->view('template/template',$data);
	}
	
	function privacy()
	{
		$data	= [
			'identity'	=> $this->session->userdata('identity'),
			'destination'	=> __FUNCTION__
		];
		$this->load->view('template/template',$data);
	}
	
	function ewallet()
	{
		$data	= [
			'identity'	=> $this->session->userdata('identity'),
			'destination'	=> __FUNCTION__
		];
		$this->load->view('template/template',$data);
	}
	
	function getRestaurantByOID($fk)//foreign key
	{
		$restaurant 	= new $this->restaurant();
		$restaurant->restaurant_owner_id 	= $fk;
		$record 		= $restaurant->getDetailByFK();
		return $record;
	}
	
	function restaurant()
	{
		$data	= [
			'identity'	=> $this->session->userdata('identity'),
			'destination'	=> __FUNCTION__
		];
		$id 	= $this->input->get_post('id');
		if(!$id && $this->session->userdata('identity')=='owner')
		{
			$id = $this->session->userdata('id');
		}
		$record = $this->input->get_post('id')?$this->getDetail("restaurant",$id):$this->getRestaurantByOID($id);
		if(!$record)
		{
			$data['record']				= $record;
			$data['prodRecords']		= [];
			$data['prodType']			= [];
			$data['prodTypeTrim']		= [];
			$data['revRecords']			= [];
			$this->load->view('template/template',$data);
		}
		else
		{
			if($record['restaurant_status'] == 'pending' ||$record['restaurant_status'] == 'unregistered')
			{
				$record['restaurant_status'] = 'unregistered';
				$record['restaurant_deliver_fee']	= false;
				$record['restaurant_life_status']	= '-';
				$record['owner_id']					= 0;
				$record['owner_name'] 				= '-';
				$record['owner_contact'] 			= '-';
				$record['owner_email']	 			= '-';
			}
			else
			{
				$oid		= $record['restaurant_owner_id'];
				$record2	= $this->getDetail("owner",$oid);
				$record		= array_merge($record,$record2);
			}
			$prodType 		= $prodTypeTrim 	= $productsByType		= [];
			$prodRecords 		= $this->getProductsByRid($record['restaurant_id']);
			if($prodRecords)
			{
				foreach($prodRecords as $num 	=> $attr)
				{
					$prodType[$attr['product_type']]		= true;
					$trimProdType 							= str_replace(' ','',$attr['product_type']);
					$prodTypeTrim[$trimProdType]			= true;
					$productsByType[$trimProdType][] 		= $prodRecords[$num];
				}
				$prodType 		= array_keys($prodType);
				$prodTypeTrim 	= array_keys($prodTypeTrim);
			}
			if($record['restaurant_business_day']=='')
			{
				$record['restaurant_business_hour'] = 'Not Enough Information.';
			}
			else
			{
				$record['restaurant_business_hour']	= $this->simplifyBHour($record['restaurant_business_hour']);
			}
			$review 					= new $this->review();
			$review->review_restaurant_id	= $id;
			$revRecords					= $review->getListByRID();
			if(!$revRecords)
				$revRecords				= [];
			$data['record']				= $record;
			$data['prodRecords']		= $prodRecords;
			$data['prodType']			= $prodType;
			$data['prodTypeTrim']		= $prodTypeTrim;
			$data['productsByType']		= $productsByType;
			$data['revRecords']			= $revRecords ;
			$this->load->view('template/template',$data);
		}
	}
	
	function submitReview()
	{
		$rid 		= $this->input->get_post('hidRID');
		if(!$rid || $this->session->userdata('identity')!='customer')
		{
			$this->setSomeMessage("Invalid URL");
			redirect("page/index");
		}
		else
		{
			$rating 		= $this->input->get_post('rangRate');
			$content 		= $this->input->get_post('txtContent');
			$recordRes 		= $this->getDetail("restaurant",$rid);
			$currentrating 	= $recordRes['restaurant_rating'];
			$currentratedby	= $recordRes['restaurant_rated_by'];
			$newrating		= number_format(($currentrating*$currentratedby+$rating)/++$currentratedby,2,'.','');
			$restaurant 	= new $this->restaurant();
			$restaurant->restaurant_id			= $rid;
			$restaurant->restaurant_rating 		= $newrating;
			$restaurant->restaurant_rated_by	= $currentratedby;
			$affected_row	= $restaurant->updaterating();
			if($affected_row)
			{
				$review 	= new $this->review();
				$review->review_content				= $content;
				$review->review_rating				= $rating;
				$review->review_customer_name		= $this->session->userdata('custname');
				$review->review_restaurant_id		= $rid;
				$review->review_restaurant_name		= $recordRes['restaurant_name'];
				$review->review_created_by			= $this->session->userdata('id');
				$review->review_created_date		= date('Y-m-d H:i:s');
				$insert_id		= $review->insert();
				if($insert_id)
				{
					redirect("page/restaurant?id={$rid}");
				}
				else
				{
					$this->setSomeMessage("Server Error: Unable to insert record into database. Please try to order again later or contact admin for help.");
					redirect("page/restaurant?id={$rid}");
				}
			}
			else
			{
				$this->setSomeMessage("Server Error: Unable to update record into database. Please try to order again later or contact admin for help.");
				redirect("page/restaurant?id={$rid}");
			}
		}
	}
	
	function simplifyBHour($restaurantBHour='Monday=13:00-22:00-,Thursday=09:00-19:00-,Friday=09:00-19:00-,Saturday=09:00-19:00-,Sunday=11:00-17:00-,')
	{
		$days 	= ['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'];
		$arrayHour		= $this->convertStringToArray($restaurantBHour);
		$newArray		= [];
		foreach($days as $num => $day)
		{
			if(isset($arrayHour[$day]))
			{
				$newArray[$arrayHour[$day][0]." to ".$arrayHour[$day][1]][] = $day;
			}
		}
		$newday		= array_flip($days);
		$emptyString	= '';
		foreach($newArray as $duration => $day)
		{
			$zombie 	= false;
			if(count($day)>2)
			{
				$count = 0;
				$zombie = true;
				foreach($day as $num => $foo)
				{
					if($count==0)
					{
						$count = $newday[$foo];
					}
					elseif($zombie == true)
					{
						if($newday[$foo] != $count)
							$zombie = false;
					}
					$count++;
				}
				if($zombie == true)
				{
					$endpos = $newArray[$duration][count($newArray[$duration])-1];
					$startpos	= $newArray[$duration][0];
					unset($newArray[$duration]);
					$newString	= $startpos." to ".$endpos;
					$emptyString .= $newString.",";
					//echo $newArray[$duration][0]."<br />";
				}
			}
			if(!$zombie)
			{
				foreach($day as $num => $foo)
				{
					$emptyString	.= $foo.",";
				}
			}
			$emptyString = substr($emptyString,0,count($emptyString)-2);
			$emptyString .= " : {$duration}<br/>";
		}
		return $emptyString;
		//echo $emptyString;
	}
	
	function topupform()
	{
		if($this->session->userdata('identity')!='customer')
		{
			$this->setSomeMessage("You do not have enough authority to access this page. Click OK to redirect back to home page.");
			redirect("page/index");
		}
		else
		{
			$checked 		= $this->session->flashdata('checked');
			if($this->session->userdata('identity')=='customer' && !$checked)
			{
				$this->setSome('prevdest',"topupform");
				redirect("page/promptsecure");
			}
			else
			{
				$data	= [
					'identity'	=> $this->session->userdata('identity'),
					'destination'	=> __FUNCTION__
				];
				$this->load->view('template/template',$data);
			}
		}
	}
	
	function randomStringGenerator()
	{
		$string 		= "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
		$newString		= "";
		for($i=0;$i<16;$i++)
			$newString	.= substr($string,mt_rand(0,strlen($string)),1);
		return $newString;
	}
	
	function p_topup()
	{
		$topup		= new $this->topup();
		$topup->topup_amount		= $this->input->get_post('txtAmount');
		$online						= $this->input->get_post('hidOnline');
		if(!$online)
		{
			$topup->topup_payment_method		= "Online Banking";
			$topup->topup_reference_code		= $this->input->get_post('txtCardNumber');
		}
		else
		{
			$topup->topup_payment_method		= "Credit/Debit Card Transfer";
			$topup->topup_reference_code		= $this->randomStringGenerator();
		}
		$money 						= $this->session->userdata('ewallet');
		$money						+= $this->input->get_post('txtAmount');
		if($money>9999999999999999.99)
		{
			$string 		= 9999999999999999.99;
			$this->setSomeMessage("Top-up amount exceed account limit. Note : E-wallet amount cannot exceed RM {$string}");
		}
		else
		{
			$recordCust					= $this->getDetail("customer",$this->session->userdata('id'));
			$topup->topup_created_by		= $this->session->userdata('id');
			$topup->topup_created_date		= date('Y-m-d H:i:s');
			$insert_id 				= $topup->insert();
			if(!$insert_id)
			{
				$this->setSomeMessage("Server Error: Unable to insert record into database. Please try again later or contact admin for help.");
				redirect("page/index");
			}
			else
			{
				$customer 						= new $this->customer();
				$customer->customer_id			= $this->session->userdata('id');
				$customer->customer_balance		= $money;
				$affected_row					= $customer->updatewallet();
				$money 							= number_format($money,2,'.',',');
				if($affected_row)
				{
					$this->setSomeMessage("Topup successfull. Your new balance is RM {$money}");
					redirect("page/index");
				}
				else
				{
					$this->setSomeMessage("Server Error: Unable to update record into database. Please try again later or contact admin for help.");
					redirect("page/index");
				}
			}
		}
		
	}
	//template function end
	
}