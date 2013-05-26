<?
// write the order form $_SESSION to orders.xml

	session_start();
	$menu = simplexml_load_file('menu.xml');
	$orders = simplexml_load_file('orders.xml');
	
?>
<html>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
	<title>Check Out</title>
<body>
	<h1>Check Out</h1>
	<p>
		Your Order have been sent to the host. 
	</p>

	<?
		if(isset($_SESSION[cart])){

			$lastOrder=$orders->xpath("/orders/order[last()]");
			$lastOrderAttr= $lastOrder[0]->attributes();

			// echo '<pre>';
			// print_r($lastOrder[0]);
			// echo '<pre>';
			echo '<br/> the last order ID is '.$lastOrderAttr['id'];
			$newOrderID = $lastOrderAttr['id'] + 1;
			echo '<br/> the new order ID is '.$newOrderID;


			$lastOrder[0]->addAttribute("test","test");
			$orders->addChild("order")->addAttribute("id","$newOrderID");
			$newOrder = $orders->xpath("/orders/order[last()]");
			$newOrder[0]->addChild("orderUser")->addAttribute("id","uID002");
			$newOrder[0]->orderUser->addChild("name","Jack");
			$newOrder[0]->addChild("orderTime","2013-05-26");
			$newOrder[0]->addChild("items");

			$i = 0;
			$totalPrice = 0;
			foreach ($_SESSION[cart] as $key => $value) {
				if($value>0){
					$itemInfo = $menu->xpath("/menu/item[@id='$key']");

					$newOrder[0]->items->addChild("item")->addAttribute("id",$key);
					$newOrder[0]->items->item[$i]->addChild("name",$itemInfo[0]->name);
					$newOrder[0]->items->item[$i]->addChild("description",$itemInfo[0]->description);
					$newOrder[0]->items->item[$i]->addChild("price",$itemInfo[0]->price);
					$newOrder[0]->items->item[$i]->addChild("num",$value);
					$i += 1;
					$totalPrice += (float)$itemInfo[0]->price * $value ;
				}	
			}
			$newOrder[0]->addChild("totalPrice",$totalPrice);

			$orders->asXML("orders.xml");

			session_destroy();

			require('showorder.php');
			// echo '<pre>';
			// print_r($orders);
			// echo '<pre>';
		}else{
			echo '<p>your cart is empty, cant check out.</p>';
		}
		
	?>


	<? //require('showcart.php'); ?>
</body>
</html>