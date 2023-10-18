<?php
/*
HTML Utama
*/
ob_start("minifier");
function minifier($code) {
    $search = array(
         
        // Remove whitespaces after tags
        '/\>[^\S ]+/s',
         
        // Remove whitespaces before tags
        '/[^\S ]+\</s',
         
        // Remove multiple whitespace sequences
        '/(\s)+/s',
         
        // Removes comments
        '/<!--(.|\s)*?-->/'
    );
    $replace = array('>', '<', '\\1');
    $code = preg_replace($search, $replace, $code);
    return $code;
}

$filePath = "iplist/deny.txt";
$lines = count(file($filePath));
?>
<!doctype html><html>
	<head>
		<title>Server BabahDigital</title>
		<meta name="robots" content="noindex,nofollow">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" type="image/png" href="favicon.ico">
        <link rel="stylesheet" type="text/css" href="/dist/css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="style.css" />
	</head>
<body>
  <div class="container" style="max-width: 650px;">
    <div class="grid text-left" style="margin-top: 25%;">
      <div>
		<h1>BabahDigital!</h1>
			<p class="muted">Perusahaan Konsultan IT, Elektrikal Berbasis IoT, & Developer Berbasis Teknologi. <a href="#" data-bs-toggle="modal" data-bs-target="#Modalkontak" title="Form Kontak Kami">Hubungi Kami</a>, Solve Faster, Serve Better!</p>
			<p class="muted">Kumpulan 
				<a class="disablelink" href="#" data-bs-toggle="modal" data-bs-target="#Modal" title="Daftar IP Blacklist">IP Blacklist</a>
				<span class="badge text-bg-danger"><?php echo $lines; ?> </span> Yang Terekam Oleh Database Kami
			</p>
			<?php include ("inc/kontak.php"); ?>
			<p class="placeholder-glow font-monospace"><span class="placeholder" style="width: 20px; min-height: 0.15em!important; margin-right: 5px;"></span>Team BabahDigital</p>
			<?php include ("inc/iplist.php"); ?>
			<?php include ("inc/mkontak.php"); ?>
      </div>
    </div>
  </div>
  <div class="badgeabuse">
    <a href="https://www.abuseipdb.com/user/42354" title="AbuseIPDB is an IP address blacklist" target="_blank">
        <img src="https://www.abuseipdb.com/contributor/42354.svg" alt="AbuseIPDB Contributor Badge">
    </a>      
  </div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="main.js"></script>
<script src="/dist/js/bootstrap.bundle.min.js"></script>
<script src="/dist/js/bootstrap.min.js"></script>
</body></html>
<?php
ob_end_flush();
?>
