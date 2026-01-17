<?php
$extensions = ['bcmath', 'ctype', 'curl', 'dom', 'fileinfo', 'gd', 'json', 'mbstring', 'openssl', 'pcre', 'pdo', 'pdo_mysql', 'tokenizer', 'xml'];
foreach ($extensions as $ext) {
    $loaded = extension_loaded($ext) ? 'Yes' : 'No';
    echo "$ext: $loaded<br>";
}

echo "curl_version: " . (function_exists('curl_version') ? 'Yes' : 'No') . "<br>";
echo "file_get_contents: " . (file_get_contents(__FILE__) ? 'Yes' : 'No') . "<br>";
echo "allow_url_fopen: " . (ini_get('allow_url_fopen') ? 'Yes' : 'No') . "<br>";
echo "PHP_VERSION: " . PHP_VERSION . "<br>";
$currentPHP = explode('.', PHP_VERSION)[0] . '.' . explode('.', PHP_VERSION)[1];
echo "currentPHP: $currentPHP<br>";
?>
