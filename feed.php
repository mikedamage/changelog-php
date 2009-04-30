<?php
	require_once("includes/prolog.php");
	
	// Set content type to plain text for debugging:
	// header("Content-Type: text/plain");
	
	// Tell the browser we're sending an ATOM feed:
	header("Content-Type: application/xml");
	
	function uuid($prefix = 'urn:uuid:', $string = '') {
    	$chars = md5($string);
    	$uuid  = substr($chars,0,8) . '-';
    	$uuid .= substr($chars,8,4) . '-';
    	$uuid .= substr($chars,12,4) . '-';
    	$uuid .= substr($chars,16,4) . '-';
    	$uuid .= substr($chars,20,12);
    	return $prefix . $uuid;
  	}
	
	$date_header_regex = '/^#{2}\ (.+)$/';
	$date_format = "%Y-%m-%dT%H:%M:%SZ";
	$last_updated = filemtime($config["changelog"]["file"]);
	$entries = preg_split('/\-{4,}/', $changelog);
?>
<?php print '<?xml version="1.0" encoding="utf-8"?>'; ?>
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
			preg_match_all('/^\#{2}\ (.+)/m', $entry, $date_matches);
			if (count($date_matches) > 1) {
				$date = $date_matches[1][0];
				$atom_date = strftime($date_format, strtotime($date));
				echo "<entry>";
				echo "<title>".$date."</title>";
				echo '<link href="'.$config['feed']['alternate'].'" />';
				echo "<id>".uuid($date)."</id>";
				echo "<updated>".$atom_date."</updated>";
				echo '<content type="xhtml">'."\n";
				echo "<![CDATA[\n";
				echo Markdown($entry);
				echo "]]>\n";
				echo "</content>\n";
				echo "</entry>";
			}
		}
	?>
</feed>