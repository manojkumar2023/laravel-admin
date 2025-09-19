<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        // Drop the legacy 'agents' table if it exists. This is a safe cleanup migration
        // created because agent functionality was moved into the existing 'users' table.
        if (Schema::hasTable('agents')) {
            Schema::drop('agents');
        }
    }

    public function down()
    {
        // Recreate a minimal agents table in case someone needs to rollback.
        Schema::create('agents', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('email')->unique();
            $table->string('mobile', 20)->nullable();
            $table->text('address')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->string('password');
            $table->timestamps();
            $table->softDeletes();
        });
    }
};
