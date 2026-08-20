<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColToTable extends Migration
{
    public function up()
    {
        Schema::table('new_students', function (Blueprint $table) {
            $table->string('email')->unique()->after('name');
            $table->renameColumn('grade', 'class_name');
            $table->dropColumn('age');
        });
    }

    public function down()
    {
        Schema::table('new_students', function (Blueprint $table) {
            $table->dropColumn('email');
            $table->renameColumn('class_name', 'grade');
            $table->integer('age');
        });
    }
}