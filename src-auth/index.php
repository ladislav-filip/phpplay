<?php
    class Helper {
        public static $isPost = false;
        public static $returnUrl;        
        public static $ver = 7;
    }

    Helper::$isPost = isset($_POST['sign']);
    Helper::$returnUrl = $_GET['returnUrl'];

    function redirectPostAsHtml() {
        $samlFile = './saml.xml';
        $saml = file_get_contents($samlFile);
        $samlZip = base64_encode(gzcompress($saml, 9));

        ?><html>
            <head>
                <title>SAML auth</title>
            </head>
            <body onload="setTimeout(function() { document.forms['form'].submit(); }, 300)">
                <h3>SAML autentification v<?=Helper::$ver?></h3>
                <p>URL back = <?=Helper::$returnUrl?></p>
                <form name="form" method="post" action="<?=Helper::$returnUrl?>" >
                    <input type="hidden" name="SAML" value="<?=$samlZip?>" />
                    <input type="text" name="info" value="povedlo se" />
                </form>
            </body>
        </html>
        <?php
    }

    if (Helper::$isPost) {
        redirectPostAsHtml();
        exit;
    }
    
?>
<html>
<head>
    <title>SAML auth</title>
</head>
<body>

<form method="post">

    <h3>SAML autentification v<?=Helper::$ver?></h3>
    <p>Return URL: <?=Helper::$returnUrl?></p>

    <div>
        <label>Username:</label>
        <input type="text" name="username" value="<?=$_POST['username']?>" />
    </div>

    <div>
        <label>Password:</label>
        <input type="text" name="password" />
    </div>

<?php

    if (Helper::$isPost) {
        ?>
        <div>
            autentifikace selhala
        </div>
        <?php
    }


?>



    <div>
        <input name="sign" type="submit" value="sign"/>
    </div>

</form>

</body>
</html>