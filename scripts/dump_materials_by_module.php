<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Material;
$groups = Material::all()->groupBy('property_module_id')->map(function($g){
    return $g->map(function($m){ return ['id'=>$m->id,'material_name'=>$m->material_name]; });
});

echo json_encode($groups, JSON_PRETTY_PRINT);
