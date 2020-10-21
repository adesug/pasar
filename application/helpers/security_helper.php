<?php if (!defined("BASEPATH")) exit("No direct script access allowed");

function encrypt_url($string) {
    $output = false;
    /*
    * read security.ini file & get encryption_key | iv | encryption_mechanism value for generating encryption code
    */        
    $security       = parse_ini_file("security.ini");
    $secret_key     = $security["encryption_key"];
    $secret_iv      = $security["iv"];
    $encrypt_method = $security["encryption_mechanism"];
    // hash
    $key    = hash("sha256", $secret_key);
    // iv – encrypt method AES-256-CBC expects 16 bytes – else you will get a warning
    $iv     = substr(hash("sha256", $secret_iv), 0, 16);
    //do the encryption given text/string/number
    $result = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
    $output = base64_encode($result);
    return $output;
}
function decrypt_url($string) {
    $output = false;
    /*
    * read security.ini file & get encryption_key | iv | encryption_mechanism value for generating encryption code
    */
    $security       = parse_ini_file("security.ini");
    $secret_key     = $security["encryption_key"];
    $secret_iv      = $security["iv"];
    $encrypt_method = $security["encryption_mechanism"];
    // hash
    $key    = hash("sha256", $secret_key);
    // iv – encrypt method AES-256-CBC expects 16 bytes – else you will get a warning
    $iv = substr(hash("sha256", $secret_iv), 0, 16);
    //do the decryption given text/string/number
    $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
    return $output;
}

function isTokenExpired($token){
    $token=$this->decrypt_url($token);
    $token=explode(".",$token);
    $time=$token[1];
    $week=strtotime("-1 week");
    if($time<$week){
        return 1;
    }else{
        return 0;
    }
}

function getUserFromToken($token)
{
    $token=decrypt_url($token);
    $token=explode(".",$token);
    return $token[0];
}

function generateNewToken($user)
{   
    return encrypt_url($user.".".time());
}