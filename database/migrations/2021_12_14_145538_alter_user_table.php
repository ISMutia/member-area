<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AlterUserTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        DB::statement("ALTER TABLE user MODIFY status ENUM('customer', 'admin') NOT NULL");

        Schema::table('user', function (Blueprint $table) {
            $table->string('contact_wa')->nullable();
            $table->text('address')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('user', function (Blueprint $table) {
            $table->dropColumn('contact_wa');
            $table->dropColumn('address');
        });
    }
}
