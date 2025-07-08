<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('todos', function (Blueprint $table) {
            $table->string('status')->default('en_cours');
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
        });
    }

    public function down()
    {
        Schema::table('todos', function (Blueprint $table) {
            $table->dropColumn(['status', 'start_date', 'end_date']);
        });
    }
};
