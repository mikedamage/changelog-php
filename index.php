<?php
	require_once("includes/spyc.php");
	require_once("includes/markdown.php");
	require_once("includes/classTextile.php");
	require_once("includes/simple_html_dom.php");
	
	$config = Spyc::YAMLLoad("config.yml");
	$changelog = file_get_contents($config["changelog"]["file"]);
	$html = Markdown($changelog);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<?php
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
	?>
	
	<title><?php echo $config["html"]["title"]; ?></title>
	
</head>

<body>


</body>
</html>
