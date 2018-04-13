<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddImagePathToUsers extends Migration
{
  
    public function up() {
        Schema::table('users', function($table) {
            $table->string('path_thumb')->nullable();
            $table->string('path_original')->nullable();
        });
    }

    public function down() {
        Schema::table('users', function($table) {
            $table->dropColumn('path_thumb');
            $table->dropColumn('path_original');
        });
    }
}
