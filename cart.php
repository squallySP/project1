<?
	session_start();
	$menu = simplexml_load_file('menu.xml');
?>
<html>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
	<title>My Cart</title>
<body>
	<h1>My Cart</h1>
	<? require('showcart.php'); ?>
<!-- 	<pre>
		<?
			//$_SESSION[cart]=array();
			foreach ($_POST as $key => $value) {
				$_SESSION[cart][$key] += (int)$value;
			}

			//$_SESSION[go] = $_SESSION[cart]["i001"];

			echo '<br />'.'$_POST';
			print_r($_POST);
			echo '<br />'.'$_SESSION';
			print_r($_SESSION);
		?>
	</pre> -->
</body>
</html>