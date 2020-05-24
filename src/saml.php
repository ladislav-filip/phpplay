<?php
var_dump($_POST);

$redisHost = getenv('REDIS_HOST');
$spaUrl = getenv('SPA_URL');

$redis = new Redis();
$redis->connect($redisHost, 6379);

if (isset($_POST['SAML'])) {
    $saml = $_POST['SAML'];
    $samlHash = md5($saml);
    $redis->set($samlHash, $saml);

    setcookie('samlhash', $samlHash, time() + 10);
    header('Location: ' . $spaUrl . '?samlHash=' . $samlHash);
    exit;
}

if ($redis->ping()) {
    echo "PONG\n";

    $redis->set('phpplay', 'funguje to');
}
