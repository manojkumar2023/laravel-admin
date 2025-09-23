<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('estimate_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('estimate_id')->constrained('estimates')->onDelete('cascade');
            $table->string('serial')->nullable();
            $table->string('area')->nullable();
            $table->string('element')->nullable();
            $table->string('material')->nullable();
            $table->string('finish')->nullable();
            $table->string('dimensions')->nullable();
            $table->string('unit')->nullable();
            $table->decimal('quantity', 12, 2)->default(0);
            $table->decimal('rate', 14, 2)->default(0);
            $table->decimal('amount', 14, 2)->default(0);
            $table->string('floor')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('estimate_items');
    }
};
