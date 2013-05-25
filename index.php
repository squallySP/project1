<?
	session_start();
	$menu = simplexml_load_file('menu.xml');
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
		<title>购物page</title>
	</head>
	<body>

		<h1>网络购物测试页</h1>
		<?	
			echo '<form action="cart.php" method="post">';
			echo '<table border="1">
					<tr> <th>Name</th><th>Description</th><th>Price</th><th>Number</th> </tr>';
			foreach ($menu->item  as $item) {
				echo '<tr>';
				echo '<td>' . $item->name . '</td>';
				echo '<td>' . $item->description . '</td>';
				echo '<td>' . '$' . $item->price . '</td>';
				echo '<td>' 
					. '<input type="text" name="' . $item->attributes()->id . '" maxlength="1" value="0" size="1"/>' 
					. '</td>';
				echo '</tr>';
			}
			echo '</table>';
			echo '<input type="submit" value="submit to my cart" />';
			echo '</form>';
			echo '<pre>';
			echo '<br />'.'$_SESSION';
			print_r($_SESSION);
			echo '</pre>';
			require('showcart.php');
		?>
	</body>
</html>