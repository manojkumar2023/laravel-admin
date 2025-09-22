<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable()->index();
            $table->string('client_name');
            $table->string('mobile')->nullable();
            $table->string('email')->nullable();
            $table->longText('remarks')->nullable();
            $table->decimal('budget', 15, 2)->nullable();
            $table->enum('status', ['Cold Calling','Semi','Potential','High Potential','Junk','Lost','Booked'])->default('Cold Calling');
            $table->string('designer_name')->nullable();
            $table->longText('address')->nullable();
            $table->date('next_follow_up_date')->nullable();
            $table->date('generate_date')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });
        Schema::dropIfExists('clients');
    }
};
