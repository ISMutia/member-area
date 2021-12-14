<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTransHOrdersTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('trans_h_orders', function (Blueprint $table) {
            $table->text('link_group_wa');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('trans_h_orders', function (Blueprint $table) {
            $table->dropColumn('link_group_wa');
        });
    }
}
