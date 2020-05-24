<?php
	header("x-value: 123654");
	$signUrl = getenv('SIGN_URL');
	$returnUrl = getenv('RETURN_URL');
?>
<html>
<head>
	<title>PHP Docker Play</title>	
</head>
<body>
<h2>
<?php
echo 'Sign URL: ' .$signUrl;
?>
</h2>
<p>Lorem ipsum atak dale...</p>
<p>Oprava</p>

<p>
<a href="<?php echo $signUrl;?>?returnUrl=<?=$returnUrl?>">Sign In</a>
</p>

<p>
<a href="inf.php">PHP Info</a>
</p>

<div>
<button id="btTest">Test</button>
<button id="btTestError404">Error 404</button>
</div>

<pre>
<?php
var_dump($_ENV);
echo getenv('SIGN_URL');
?>
</pre>

<input type="hidden" id="action" value="<?=$_GET['action']?>"/>

<script type="text/javascript" src="index.js"></script>

</body>
</html>