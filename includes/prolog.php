<?php
	require_once("includes/spyc.php");
	require_once("includes/markdown.php");
	require_once("includes/classTextile.php");
	require_once("includes/simple_html_dom.php");
	
	$config = Spyc::YAMLLoad("config.yml");
	$changelog = file_get_contents($config["changelog"]["file"]);
	
	if ($config["changelog"]["format"] == "markdown") {
		$html = Markdown($changelog);
	} else if ($config["changelog"]["format"] == "textile") {
		$textile = new Textile;
		$html = $textile->TextileThis($changelog);
	}
	
	$dom = str_get_html($html);
?>