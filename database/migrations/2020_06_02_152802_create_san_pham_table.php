<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSanPhamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('san_pham', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('Tensanpham',255);
            $table->string('Soluongsp',50);
            $table->string('Hinhanh',255);
            $table->integer('Gianhap');
            $table->integer('Giaban');
            $table->integer('id_loai')->unsigned();
            $table->integer('id_ncc')->unsigned();
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
        Schema::dropIfExists('san_pham');
    }
}
