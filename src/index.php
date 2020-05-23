<?php
	header("x-value: 123654");
	$signUrl = $_ENV["SIGN_URL"];
	$returnUrl = $_ENV["RETURN_URL"];
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
<a href="<?=$signUrl?>?returnUrl=<?=$returnUrl?>">Sign In</a>
</p>

<div>
<button id="btTest">Test</button>
<button id="btTestError404">Error 404</button>
</div>

<script type="text/javascript" src="index.js"></script>

</body>
</html>