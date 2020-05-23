<?php
header('Content-Type: application/json');

class MyResult {
    public $value;
}

$endPoint = $_GET['api'];
$apiValue = $_GET['value'];

switch ($endPoint) {
    case 'token':
        $samlFile = './saml.xml';
        $saml = file_get_contents($samlFile);
        $fileSize = filesize($samlFile) / 1024;
        // header('SAML: ' . $saml);        
        $samlZip = base64_encode(gzcompress($saml, 9));
        header('SAMLz: ' . $samlZip);
        echo json_encode(['SAML' => $samlZip, 'fileSize' => $fileSize]);
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


