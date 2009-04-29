<?php
	require_once("includes/spyc.php");
	require_once("includes/spyc.php");
	require_once("includes/markdown.php");
	require_once("includes/classTextile.php");
	require_once("includes/simple_html_dom.php");
	
	$config = Spyc::YAMLLoad("config.yml");
	$changelog = file_get_contents($config["changelog"]["file"]);
?>