<?php
const METHOD="AES-256-CBC";
const SECRET_KEY='$SCAA@2020';
const SECRET_IV='097970';

$key=hash('sha256', SECRET_KEY);
$iv=substr(hash('sha256', SECRET_IV), 0, 16);
$output=openssl_decrypt(base64_decode("dWl3ZEExT2pORkJVMjRTK0lOTkg0UT09"), METHOD, $key, 0, $iv);
echo $output;
