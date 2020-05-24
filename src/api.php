<?php
header('Content-Type: application/json');

class MyResult {
    public $value;
}

$endPoint = $_GET['api'];
$apiValue = $_GET['value'];
$redisHost = getenv('REDIS_HOST');

function getHeader($keyFind) {
    $headers =  getallheaders();
    foreach($headers as $key=>$val){
      if ($key === $keyFind) {
        return $value;
        break;
      }
    }    
    return null;
}

switch ($endPoint) {
    case 'saml':
        $redis = new Redis();
        $redis->connect($redisHost, 6379);
        $saml = $redis->get($apiValue);
        echo json_encode(['SAML' => $saml]);
        break;
    case 'token':
        header_remove('Content-Type');
        header("Content-Type: application/json; charset=UTF-8");
        $saml = getHeader('SAML');
        if ($saml) {
            echo "console.log('Saml is ready.');";
        }
        else {
            $signUrl = getenv('SIGN_URL');
	        $returnUrl = getenv('RETURN_URL');
            $url = "{$signUrl}?returnUrl={$returnUrl}";
            echo "window.open('{$url}', '_self');";
        }

        /**
        $samlFile = './saml.xml';
        $saml = file_get_contents($samlFile);
        $fileSize = filesize($samlFile) / 1024;
        // header('SAML: ' . $saml);        
        $samlZip = base64_encode(gzcompress($saml, 9));
        header('SAMLz: ' . $samlZip);
        echo json_encode(['SAML' => $samlZip, 'fileSize' => $fileSize]);
        */
        break;

    case 'data':
        $result = new MyResult();
        $result->value = 221;
        echo json_encode($result);
        break;

    default:
        http_response_code(404);
        break;
}


