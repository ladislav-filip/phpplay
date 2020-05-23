<?php
header('Content-Type: application/json');

class MyResult {
    public $value;
}

$endPoint = $_GET['api'];
$apiValue = $_GET['value'];

switch ($endPoint) {
    case 'token':
        header('SAML: aaassssss');
        echo json_encode(['SAML' => 'aaaa444444444']);
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


