<?php

$required_extensions = array(
	'curl',
	'date',
	'dom',
	'filter',
	'ftp',
	'gd',
	'hash',
	'iconv',
	'json',
	'libxml',
	'mbstring',
	'mysql',
	'openssl',
	'pcre',
	'posix',
	'SimpleXML',
	'sockets',
	'SPL',
	'tokenizer',
	'xml',
	'xmlreader',
	'zlib'
);
$desired_extension = array(
	'imagick',
	'mysqli',
	'exif',
	'pspell',
	'gmagick'
);

$installed = array();
$missing = array();
$preferred = array();


foreach ( $required_extensions as $extension ) {
	if ( extension_loaded( $extension ) ) {
		$installed[] = $extension;
	} else {
		$missing[] = $extension;
	}
}

foreach ( $desired_extension as $extension ) {
	if ( extension_loaded( $extension ) ) {
		$installed[] = $extension;
	} else {
		$preferred[] = $extension;
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">

	<!-- Optional theme -->
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap-theme.min.css">

	<script src="http://code.jquery.com/jquery-2.1.0.min.js"></script>

	<!-- Latest compiled and minified JavaScript -->
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
	<title>PHP extensions</title>
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
	<style>
		.bg-danger, .bg-success, .bg-warning {
			font-family: monospace;
			font-weight: bold;
		}
		.bg-danger, .bg-primary, .bg-success, .bg-warning {
			padding: 10px; 15px;
		}
	</style>
</head>
<body>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h1>PHP extensions</h1>

			<p class="lead">Checks for appropriate server & PHP extensions</p>
			<p>Running PHP <strong>v<?php echo phpversion(); ?></strong>, PHP v5.4 recommended, v5.2.4 minimum</p>
			<?php
			if ( !is_writable('/tmp' ) ) {
				?>
				<p class="text-danger">Warning: /tmp is not writable</p>
				<?php
			}

			?>
		</div>
	</div>

	<div class="row">
		<div class="col-md-3">
			<h2>Installed</h2>

			<?php
			foreach ( $required_extensions as $extension ) {
				?>
				<p class="bg-success"><?php echo $extension; ?></p>
			<?php
			}
			?>
		</div>
		<div class="col-md-3">
			<h2>Missing</h2>

			<?php
			foreach ( $missing as $extension ) {
				?>
				<p class="bg-danger"><?php echo $extension; ?></p>
			<?php
			}
			if ( empty( $missing ) ) {
				?>
				<p class="bg-primary">Congratulations! Minimum requirements met!</p>
				<?php
			}
			?>
		</div>
		<div class="col-md-3">
			<h2>Preferable</h2>

			<?php
			foreach ( $preferred as $extension ) {
				?>
				<p class="bg-warning"><?php echo $extension; ?></p>
			<?php
			}
			?>
		</div>
	</div>

</div>
</body>
</html>
