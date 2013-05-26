<?
	//session_start();
	//$menu = simplexml_load_file('menu.xml');

	if(isset($_SESSION[cart])){
		echo '
			<table border="1">
			<caption>Items in the cart</caption>
			<tr><th>Name</th><th>Description</th><th>Price</th><th>Num</th></tr>';

		foreach ($_SESSION[cart] as $key => $value) {
			if($value>0){
				$item = $menu->xpath("/menu/item[@id='$key']");

				echo '<td>' . $item[0]->name . '</td>';
				echo '<td>' . $item[0]->description . '</td>';
				echo '<td>' . '$' . $item[0]->price . '</td>';
				echo '<td>' . ' ' . $value .'</td>';
				echo '</tr>';
			}	
		}
		echo '</table>';

		echo '<a href="checkout.php">Check Out</a>';
	}else{
		echo 'your cart is empty';
	}
?>


