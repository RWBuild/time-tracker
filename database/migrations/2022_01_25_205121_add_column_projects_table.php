<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('projects',function(blueprint $table){
           $table->integer('client_id');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        if(Schema::hascolumn('projects','client_id')){
            Schema::table('projects', function (blueprint $table){
                $table->dropColumn('client_id');
            });
        }
    }
}
