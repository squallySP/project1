<?
	session_start();
	$menu = simplexml_load_file('menu.xml');
?>
<html>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
	<title>My Cart</title>
<body>
	<h1>My Cart</h1>
	<?
		foreach ($_POST as $key => $value) {
			$_SESSION[cart][$key] += (int)$value;
		}
		require('showcart.php');
	?>

</body>
</html>