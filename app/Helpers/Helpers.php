<?php

function APIMiddleware($array_plaintext, $path)
{
    $privatekey = '89T29UCH8X649K6W';
    $publickey = 'GE8I19241CVO15TB';
    $url = 'http://localhost/api/middlewareapi/' . $path;
    // $url = 'http://uat2.care.co.id:9095/ACA/WebAPI2/middlewareapi/' . $path;
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

    // $response = Http::timeout(60)->post($url, [
    //     'data' => $ciphertext,
    //     'XPublic' => $publickey,
    // ]);

    $response = Http::post($url, [
        'data' => $ciphertext,
        'XPublic' => $publickey,
    ]);
    $response->throw();
    $data = $response->json();

    return $data;
}

function tgl_indo($tanggal){
    $bulan = array (
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $pecahkan = explode('/', $tanggal);

    // dd($pecahkan);
    
    // variabel pecahkan 0 = tanggal
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tahun
    // dd($pecahkan[1] . ' ' . $bulan[ (int)$pecahkan[0] ] . ' ' . $pecahkan[2]);
    return $pecahkan[1] . ' ' . $bulan[ (int)$pecahkan[0] ] . ' ' . $pecahkan[2];
}