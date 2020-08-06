<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNhapSpTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nhap_sp', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Soluongnhap',50);
            $table->date('Thoigiannhap');
            $table->string('Thanhtien',255);
            $table->integer('id_spnhap')->unsigned();
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
        Schema::dropIfExists('nhap_sp');
    }
}
