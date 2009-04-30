<?php require_once("includes/prolog.php"); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<?php
		// Include user stylesheets, if any:
		if (count($config["html"]["stylesheets"]["screen"]) > 0) {
			foreach($config["html"]["stylesheets"]["screen"] as $stylesheet) {
				echo '<link rel="stylesheet" type="text/css" media="screen, projection" href="' . $stylesheet . '" />';
			} 
		}
		if (count($config["html"]["stylesheets"]["print"]) > 0) {
			foreach($config["html"]["stylesheets"]["print"] as $stylesheet) {
				echo '<link rel="stylesheet" type="text/css" media="print" href="' . $stylesheet . '" />';
			}
		}
		if (count($config["html"]["stylesheets"]["ie"]) > 0) {
			echo "<!--[if IE]>";
			foreach($config["html"]["stylesheets"]["ie"] as $stylesheet) {
				echo '<link rel="stylesheet" type="text/css" media="all" href="' . $stylesheet . '" />';
			}
			echo "<![endif]-->";
		}
		
		// Include user Javascript, if any:
		if (count($config["html"]["javascripts"]) > 0) {
			foreach($config["html"]["javascripts"] as $script) {
				echo '<script type="text/javascript" src="' . $script . '"></script>';
			}
		}
	?>
	
	<title><?php echo $config["html"]["title"]; ?></title>
	
</head>

<body>
	<?php
		if ($config["html"]["show_title_h1"] == "true")
			echo "<h1>{$config['html']['title']}</h1>";
	?>
	<?php echo $html; ?>
</body>
</html>
