<?php
$dirs = ['core/bootstrap/cache/', 'core/storage/', 'core/storage/app/', 'core/storage/framework/', 'core/storage/logs/'];
foreach ($dirs as $dir) {
    $perm = substr(sprintf('%o', fileperms($dir)), -4);
    echo "$dir: $perm<br>";
}
?>
