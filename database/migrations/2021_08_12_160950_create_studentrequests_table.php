<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentrequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('studentrequests', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->bigInteger('generation_id');
            $table->text('reason');
            $table->integer('confirm')->nullable();
            $table->integer('avatar')->nullable();
            $table->integer('name')->nullable();
            $table->integer('npm')->nullable();
            $table->integer('email')->nullable();
            $table->integer('phone')->nullable();
            $table->integer('gender')->nullable();
            $table->integer('birth_data')->nullable();
            $table->integer('blood_group')->nullable();
            $table->integer('religion')->nullable();
            $table->integer('address')->nullable();
            $table->integer('boarding_address')->nullable();
            $table->integer('line')->nullable();
            $table->integer('interest')->nullable();
            $table->integer('father_name')->nullable();
            $table->integer('father_job')->nullable();
            $table->integer('father_phone')->nullable();
            $table->integer('mother_name')->nullable();
            $table->integer('mother_job')->nullable();
            $table->integer('mother_phone')->nullable();
            $table->integer('income')->nullable();
            $table->integer('organization')->nullable();
            $table->integer('committee')->nullable();
            $table->integer('seminar')->nullable();
            $table->integer('achievment')->nullable();
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
        Schema::dropIfExists('studentrequests');
    }
}
