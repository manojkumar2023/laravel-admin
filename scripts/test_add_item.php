<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';

// Bootstrap the application
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Http\Request;

$controller = $app->make(\App\Http\Controllers\EstimateController::class);

// Create a draft first
$header = [
    'bi_executive' => 'SmokeTester',
    'client_name' => 'Smoke Client',
    'property_type' => 'apartment',
    'property_selection' => '2BHK',
    'estimate_date' => date('Y-m-d'),
    'expiry_date' => date('Y-m-d', strtotime('+10 days'))
];

$req = Request::create('/estimate/draft', 'POST', [], [], [], [], json_encode($header));
$req->headers->set('Content-Type', 'application/json');
$resp = $controller->draft($req);
$body = $resp->getData();
echo "Draft: " . json_encode($body) . PHP_EOL;

$estimateId = $body->estimate_id;

// Add item
$item = [
    'area' => 'Living Room',
    'element' => 'TV Unit',
    'material' => 'Carcass - Plywood MR (19mm) Shutter - HDHMR (19mm)',
    'finish' => 'Laminate',
    'dimensions' => '8 ft x 2 ft',
    'unit' => 'sft',
    'quantity' => 1,
    'rate' => '1000',
    'amount' => '8000',
    'floor' => 'Ground',
    'property_type' => 'apartment',
    'property_selection' => '2BHK',
    'discount_percent' => 15
];

$req2 = Request::create('/estimate/' . $estimateId . '/item', 'POST', [], [], [], [], json_encode($item));
$req2->headers->set('Content-Type', 'application/json');
$resp2 = $controller->addItem($req2, $estimateId);
$body2 = $resp2->getData();
echo "AddItem: " . json_encode($body2) . PHP_EOL;

// Fetch items
$req3 = Request::create('/estimate/' . $estimateId . '/items', 'GET');
$resp3 = $controller->items($estimateId);
echo "Items: " . json_encode($resp3->getData()) . PHP_EOL;
