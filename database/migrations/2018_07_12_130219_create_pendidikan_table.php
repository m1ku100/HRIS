<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePendidikanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendidikan', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('CASCADE');
            $table->integer('edu_id')->unsigned();
            $table->foreign('edu_id')->references('id')->on('edu')->onUpdate('CASCADE');
            $table->string('instansi');
            $table->string('jurusan')->nullable();
            $table->integer('negara_id')->unsigned();
            $table->foreign('negara_id')->references('id')->on('negara')->onUpdate('CASCADE');
            $table->string('tahun_lulus');
            $table->string('ipk');
            $table->softDeletes();
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
        Schema::dropIfExists('pendidikan');
    }
}
