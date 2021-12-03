<?php

use Illuminate\Support\Facades\Crypt,
    Illuminate\Support\Str,
    Illuminate\Http\Request;

function format_number($angka){
    $hasil =  number_format($angka,0, ',' , '.');
    return $hasil;
}

function encodeID($angka){
    $first =  strlen($angka);
    if($first>=10) return false;
    $code = rand(11,99);
    $acak = $code+$angka;
    $sha1 = sha1($code.$acak.config('app.key'));
    return substr($sha1,0,10).$code.$acak.substr($sha1,29,10);
}

function decodeID($str){
    $step1 = substr($str,10);
    $step2 = substr($step1,0,-10);
    $code  = substr($step2,0,2);
    $angka = substr($step2,2);
    $angka = $angka-$code;
    return $angka;
}
