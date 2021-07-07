<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMultipleColumnsToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {

            $table->string('middle_name')->after('name');
            $table->string('last_name')->after('middle_name')->nullable();
            $table->string('phone_no')->after('password');
            $table->string('country')->after('phone_no');
            $table->string('ni_number')->after('country');
            $table->string('image_url')->after('ni_number')->nullable();
            $table->boolean('verified')->default(0)->after('image_url');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('middle_name');
            $table->dropColumn('last_name');
            $table->dropColumn('phone_no');
            $table->dropColumn('country');
            $table->dropColumn('ni_number');
            $table->dropColumn('image_url');
            $table->dropColumn('verified');
        });
    }
}
