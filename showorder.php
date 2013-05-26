<?
//	$menu = simplexml_load_file('menu.xml');
//	$orders = simplexml_load_file('orders.xml');
	//$orderID = "1001" ;
	//$order = $orders->xpath("/orders/order[@id='$orderID']");
	$order = $orders->xpath("/orders/order[last()]");
	$items = $order[0]->xpath("items");
?>

<table border="1">
	<caption>Items in your order</caption>
	<tr><th>Name</th><th>Description</th><th>Price</th><th>Num</th></tr>
	


<?
	// echo '<pre>';
	// print_r($order[0]);
	// echo '<br />';
	// print_r($items);
	// echo '</pre>';

	foreach ($items[0] as $item) {
		echo '<tr>';
		echo '<td>' . $item->name . '</td>';
		echo '<td>' . $item->description . '</td>';
		echo '<td>' . '$' . $item->price . '</td>';
		echo '<td>' . $item->num .'</td>';
		echo '</tr>';
	}
	echo '<tr>';
	echo '<td></td><td>Total Price </td><td>' .'$'.$order[0]->totalPrice . '</td><td></td>';
	echo '</tr>';
?>

</table>