<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlumnirequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumnirequests', function (Blueprint $table) {
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
            $table->integer('interest')->nullable();
            $table->integer('line')->nullable();
            $table->integer('instagram')->nullable();
            $table->integer('twitter')->nullable();
            $table->integer('facebook')->nullable();
            $table->integer('linkedin')->nullable();
            $table->integer('salary')->nullable();
            $table->integer('education')->nullable();
            $table->integer('job')->nullable();
            $table->integer('certification')->nullable();
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
        Schema::dropIfExists('alumnirequests');
    }
}
