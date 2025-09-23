<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up()
    {
        Schema::create('estimate_serials', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('next_serial')->default(1);
            $table->timestamps();
        });

        // Seed an initial row
        DB::table('estimate_serials')->insert(['next_serial' => 1, 'created_at' => now(), 'updated_at' => now()]);
    }

    public function down()
    {
        Schema::dropIfExists('estimate_serials');
    }
};
