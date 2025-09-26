<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('finishes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('property_type_id');
            $table->unsignedBigInteger('property_area_id');
            $table->unsignedBigInteger('property_module_id');
            $table->unsignedBigInteger('material_id');
            $table->string('slug')->unique();
            $table->string('status')->default('active');
            $table->timestamps();

            $table->foreign('property_type_id')->references('id')->on('property_types')->onDelete('cascade');
            $table->foreign('property_area_id')->references('id')->on('property_areas')->onDelete('cascade');
            $table->foreign('property_module_id')->references('id')->on('property_modules')->onDelete('cascade');
            $table->foreign('material_id')->references('id')->on('materials')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('finishes');
    }
};
