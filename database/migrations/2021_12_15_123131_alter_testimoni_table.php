<?php

use App\Enums\StatusActive;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTestimoniTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('trans_h_testimonial', function (Blueprint $table) {
            $table->enum('status', StatusActive::getValues());
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('trans_h_testimonial', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
}
