<?php
/**
 * Created by PhpStorm.
 * User: chaishuai
 * Date: 2021-04-26
 * Time: 15:59
 */
function create_curl($url, $params = [], $headers = [])
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $params);

    //打印错误信息
//         $out_put = curl_error($ch);
//return $out_put;
    $out_put = curl_exec($ch);

    return json_decode($out_put, true);
}

$ins_case_url = 'http://inter.cn/index.php/saveCase';
$ins_person_url = 'http://inter.cn/index.php/saveUsers';
create_curl($ins_case_url);
create_curl($ins_person_url);