<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('users', function(blueprint $table) { 
            $table->string('title')->nullable();
            $table->boolean('active')->nullable();
            $table->integer('role');
    }
    );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
        if((Schema::hasColumn('users', 'title')) || Schema::hasColumn('users', 'active') || Schema::hasColumn('users', 'role'))
        {
            Schema::table('users', function(blueprint $table){
                $table->dropColumn('title');
                $table->dropColumn('active');
                $table->dropColumn('role');
            });
        }
       

    }
}
