<?php
header('Content-Type: application/json');

class MyResult {
    public $value;
}

$endPoint = $_GET['api'];
$apiValue = $_GET['value'];

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
    case 'token':
        header_remove('Content-Type');
        header("Content-Type: application/json; charset=UTF-8");
        $saml = getHeader('SAML');
        if ($saml) {
            echo "console.log('Saml is ready.');";
        }
        else {
            $signUrl = $_ENV["SIGN_URL"];
            $returnUrl = $_ENV["RETURN_URL"];
            $url = "{$signUrl}?{$returnUrl}";
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


