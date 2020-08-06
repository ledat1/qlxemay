<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBaoHanhTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bao_hanh', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Tensanphambh',255);
            $table->string('Soluongbh',50);
            $table->date('Thoigianbh');
            $table->mediumText('Nguyennhan');
            $table->integer('id_spbh')->unsigned();
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
        Schema::dropIfExists('bao_hanh');
    }
}
