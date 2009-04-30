<?php
	require_once("includes/prolog.php");
	
	// Set content type to plain text for debugging:
	header("Content-Type: text/plain");
	
	// Tell the browser we're sending an ATOM feed:
	// header("Content-Type: application/atom+xml");
	
	function uuid($prefix = '') {
    	$chars = md5(uniqid(mt_rand(), true));
    	$uuid  = substr($chars,0,8) . '-';
    	$uuid .= substr($chars,8,4) . '-';
    	$uuid .= substr($chars,12,4) . '-';
    	$uuid .= substr($chars,16,4) . '-';
    	$uuid .= substr($chars,20,12);
    	return $prefix . $uuid;
  	}
	
	$date_format = "%Y-%m-%dT%H:%M:%SZ";
	$last_updated = filemtime($config["changelog"]["file"]);
	$entries = preg_split('/\-{4,}/', $changelog);
?>

<?php echo '<?xml version="1.0" encoding="utf-8"?>'; ?>
<feed xmlns="http://www.w3.org/2005/Atom">
	<title><?php print $config["feed"]["title"]; ?></title>
	<?php if (isset($config["feed"]["subtitle"])): ?>
	<subtitle><?php print $config["feed"]["subtitle"]; ?></subtitle>
	<?php endif; ?>
	<link rel="alternate" href="<?php print $config['feed']['alternate']; ?>" />
	<link rel="self" href="<?php print $_SERVER['REQUEST_URI']; ?>" />
	<updated><?php print strftime($date_format, $last_updated); ?></updated>
	<author>
		<name><?php print $config["feed"]["author_name"]; ?></name>
		<email><?php print $config["feed"]["author_email"]; ?></email>
	</author>
	<id><?php print $config["feed"]["id"]; ?></id>
	
	<?php
		foreach ($entries as $entry) {
			
		}
	?>
</feed>