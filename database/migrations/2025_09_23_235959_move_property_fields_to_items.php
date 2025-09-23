<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Add columns to estimate_items
        Schema::table('estimate_items', function (Blueprint $table) {
            if (!Schema::hasColumn('estimate_items', 'property_type')) {
                $table->string('property_type')->nullable()->after('serial');
            }
            if (!Schema::hasColumn('estimate_items', 'property_selection')) {
                $table->string('property_selection')->nullable()->after('property_type');
            }
        });

        // Drop columns from estimates if they exist
        Schema::table('estimates', function (Blueprint $table) {
            if (Schema::hasColumn('estimates', 'property_type')) {
                $table->dropColumn('property_type');
            }
            if (Schema::hasColumn('estimates', 'property_selection')) {
                $table->dropColumn('property_selection');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Add columns back to estimates
        Schema::table('estimates', function (Blueprint $table) {
            if (!Schema::hasColumn('estimates', 'property_type')) {
                $table->string('property_type')->nullable()->after('client_name');
            }
            if (!Schema::hasColumn('estimates', 'property_selection')) {
                $table->string('property_selection')->nullable()->after('property_type');
            }
        });

        // Drop columns from estimate_items
        Schema::table('estimate_items', function (Blueprint $table) {
            if (Schema::hasColumn('estimate_items', 'property_selection')) {
                $table->dropColumn('property_selection');
            }
            if (Schema::hasColumn('estimate_items', 'property_type')) {
                $table->dropColumn('property_type');
            }
        });
    }
};
