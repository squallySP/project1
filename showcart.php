<?
	session_start();
	$menu = simplexml_load_file('menu.xml');
?>

<table border="1">
	<caption>Items in the cart</caption>
	<tr><th>Name</th><th>Description</th><th>Price</th><th>Num</th></tr>
	


<?
	foreach ($_SESSION[cart] as $key => $value) {
		if($value>0){
			$item = $menu->xpath("/menu/item[@id='$key']");
			// echo '<tr>';
			// echo '<td><pre>' ;
			// print_r($item);
			// echo '</pre></td>';
			echo '<td>' . $item[0]->name . '</td>';
			echo '<td>' . $item[0]->description . '</td>';
			echo '<td>' . '$' . $item[0]->price . '</td>';
			echo '<td>' . ' ' . $value .'</td>';
			echo '</tr>';
		}	
	}
	
?>

</table>