<?php
	require_once("includes/prolog.php");
	
	function uuid($prefix = '') {
    	$chars = md5(uniqid(mt_rand(), true));
    	$uuid  = substr($chars,0,8) . '-';
    	$uuid .= substr($chars,8,4) . '-';
    	$uuid .= substr($chars,12,4) . '-';
    	$uuid .= substr($chars,16,4) . '-';
    	$uuid .= substr($chars,20,12);
    	return $prefix . $uuid;
  	}
	
	function getDateFromTagString($tag) {
		$time = strtotime($tag->plaintext);
		return $time;
	}
	
	$date_format = "%Y-%m-%dT%h:%i:%sZ";
	$date_headers = $dom->find("h2");
	$dates = array_map("getDateFromTagString", $date_headers);
	$reverse_dates = array_reverse($dates);
?>

<?xml version="1.0" encoding="utf-8"?>
<feed xmlns="http://www.w3.org/2005/Atom">
	<title><?php print $config["feed"]["title"]; ?></title>
	<?php if (isset($config["feed"]["subtitle"])): ?>
		<subtitle><?php print $config["feed"]["subtitle"]; ?></subtitle>
	<?php endif; ?>
	<link rel="alternate" href="<?php print $config['feed']['alternate']; ?>" />
	<link rel="self" href="<?php print $_SERVER['REQUEST_URI']; ?>" />
	<updated><?php print strftime($date_format, $reverse_dates[0]); ?></updated>
	<author>
		<name><?php print $config["feed"]["author_name"]; ?></name>
		<email><?php print $config["feed"]["author_email"]; ?></email>
	</author>
	<id><?php print uuid("urn:uuid:"); ?></id>
	
	
</feed>