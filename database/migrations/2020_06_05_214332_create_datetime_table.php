<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatetimeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('messages', function (Blueprint $table) {
         $table->string('date')->after('to');
         $table->string('time')->after('date');
        });
    }



//     $table->boolean('read')->default(false);
  //          $table->string('profile_image')->nullable();
    //         $table->timestamp('lastseen')->nullable();

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('messages', function (Blueprint $table) {
        $table->dropColumn('date');
        $table->dropColumn('time');
        });
    }
}
