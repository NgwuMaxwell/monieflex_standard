<?php

require_once 'core/vendor/autoload.php';

// Bootstrap Laravel
$app = require_once 'core/bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use App\Models\Gateway;

$g = Gateway::first();

if ($g) {
    echo "Sample gateway exists: " . $g->name . "\n";
    echo "gateway_parameters type: " . gettype($g->gateway_parameters) . "\n";
    echo "supported_currencies type: " . gettype($g->supported_currencies) . "\n";
    echo "extra type: " . gettype($g->extra) . "\n";

    if (is_object($g->gateway_parameters)) {
        echo "gateway_parameters keys: " . implode(', ', array_keys((array)$g->gateway_parameters)) . "\n";
    }

    if (is_object($g->supported_currencies)) {
        echo "supported_currencies keys: " . implode(', ', array_keys((array)$g->supported_currencies)) . "\n";
    }
} else {
    echo "No automatic gateways found\n";
}
