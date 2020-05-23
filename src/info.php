<?php
	header("x-value: 123654");
?>
<html>
<head>
	<title>PHP Docker Play</title>	
</head>
<body>
<h2>
<?php
echo 'Moje promenna: ' .$_ENV["LF_VAR"] . '!';
?>
</h2>
<p>Lorem ipsum atak dale...</p>
<p>Oprava</p>

<div>
<button id="btTest">Test</button>
<button id="btTestError404">Error 404</button>
</div>

<script type="text/javascript" src="info.js"></script>

</body>
</html>