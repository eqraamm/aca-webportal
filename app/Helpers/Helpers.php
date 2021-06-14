<?php

function APIMiddleware($array_plaintext, $path)
{
    $privatekey = '89T29UCH8X649K6W';
    $publickey = 'GE8I19241CVO15TB';
    // $url = 'http://localhost/api/middlewareapi/' . $path;
    $url = 'http://uat2.care.co.id:9095/ACA/WebAPI2/middlewareapi/' . $path;
    $data = json_encode($array_plaintext);

    //Padding for Triple DES ECB
    $blockSize = 8;
    $len = strlen($data);
    $pad = $blockSize - ($len % $blockSize);
    $data .= str_repeat(chr($pad), $pad);

    $privatekey .= substr($privatekey, 0, 8);

    $method = 'des-ede3'; //TRIPLE DES ECB
    $ciphertext = openssl_encrypt($data, $method, $privatekey, OPENSSL_NO_PADDING);
    $ciphertext = base64_encode($ciphertext);

    $response = Http::post($url, [
        'data' => $ciphertext,
        'XPublic' => $publickey,
    ]);
    $data = $response->json();

    return $data;
}
