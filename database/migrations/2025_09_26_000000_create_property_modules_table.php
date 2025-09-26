<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('property_modules', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('property_type_id');
            $table->unsignedBigInteger('property_area_id');
            $table->string('property_module_name');
            $table->string('slug')->unique();
            $table->string('status')->default('active');
            $table->timestamps();
            $table->foreign('property_type_id')->references('id')->on('property_types')->onDelete('cascade');
            $table->foreign('property_area_id')->references('id')->on('property_areas')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('property_modules');
    }
};
