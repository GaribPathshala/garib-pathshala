<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeacherApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teacher_applications', function (Blueprint $table) {
            $table->id();
            $table->string('application_id')->unique();
            $table->string('name');
            $table->string('email');
            $table->string('mobile');
            $table->string('city');
            $table->string('district');
            $table->string('state');
            $table->string('postal_code');
            $table->string('qualification');
            $table->string('experience')->nullable();
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teacher_applications');
    }
}
