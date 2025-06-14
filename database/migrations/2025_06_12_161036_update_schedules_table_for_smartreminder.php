<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateSchedulesTableForSmartreminder extends Migration
{
    public function up()
    {
        Schema::table('schedules', function (Blueprint $table) {
            //$table->renameColumn('title', 'course_name');
            //$table->dropColumn('description');
            $table->time('start_time')->change();
            $table->time('end_time')->nullable()->change();
            //$table->string('location')->nullable()->after('end_time');
        });
    }

    public function down()
    {
        Schema::table('schedules', function (Blueprint $table) {
            $table->renameColumn('course_name', 'title');
            $table->text('description')->nullable()->after('title');
            $table->dropColumn(['day', 'location']);
            $table->dateTime('start_time')->change();
            $table->dateTime('end_time')->nullable()->change();
        });
    }
}
