<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Http\Controllers\Admin\FinishController;

$ctrl = new FinishController();
foreach ([1,3] as $mid) {
    $resp = $ctrl->materialsByModule($mid);
    echo "Module $mid -> ";
    $content = method_exists($resp, 'getContent') ? $resp->getContent() : json_encode($resp);
    echo $content . PHP_EOL;
}
