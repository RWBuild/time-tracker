<?php
//TODO: SOON

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTimeEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    // public function up()
    // {
    //     Schema::create('time_entries', function (Blueprint $table) {
    //         $table->id();
    //         $table->foreign('id')->refrences('id')->on('projects');
    //         //TODO: after creating invoice model
    //         // $table->
    //         $table->timestamps();
    //     });
    // }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('time_entries');
    }
}
