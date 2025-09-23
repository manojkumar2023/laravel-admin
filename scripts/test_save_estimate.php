<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';

// Bootstrap the application
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Http\Request;

$payload = [
    'bi_executive' => 'SmokeTester',
    'client_name' => 'Smoke Client',
    'property_type' => 'apartment',
    'property_selection' => '2BHK',
    'estimate_date' => date('Y-m-d'),
    'expiry_date' => date('Y-m-d', strtotime('+10 days')),
    'items' => [
        [
            'serial' => null,
            'property_type' => 'apartment',
            'property_selection' => '2BHK',
            'area' => 'Living Room',
            'element' => 'TV Unit',
            'material' => 'Plywood MR (19mm)',
            'finish' => 'Laminate',
            'dimensions' => '8 ft x 2 ft',
            'unit' => 'sft',
            'quantity' => 1,
            'rate' => '1000',
            'amount' => '8000',
            'floor' => 'Ground'
        ]
    ]
];

$request = Request::create('/estimate/store', 'POST', [], [], [], [], json_encode($payload));
$request->headers->set('Content-Type', 'application/json');

$controller = $app->make(\App\Http\Controllers\EstimateController::class);
$response = $controller->store($request);

// If we got a JsonResponse, print its data
if (method_exists($response, 'getData')) {
    echo json_encode($response->getData()) . PHP_EOL;
} else {
    // Fallback: just var_export the response
    var_export($response);
    echo PHP_EOL;
}
