<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('estimates', function (Blueprint $table) {
            $table->id();
            $table->string('bid')->unique();
            $table->string('bi_executive')->nullable();
            $table->string('client_name')->nullable();
            $table->string('property_type')->nullable();
            $table->text('property_selection')->nullable();
            $table->date('estimate_date')->nullable();
            $table->date('expiry_date')->nullable();
            $table->decimal('total', 14, 2)->default(0);
            $table->decimal('gst', 14, 2)->default(0);
            $table->decimal('grand_total', 14, 2)->default(0);
            $table->decimal('discount', 14, 2)->default(0);
            $table->decimal('final_amount', 14, 2)->default(0);
            $table->unsignedInteger('primary_serial')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('estimates');
    }
};
