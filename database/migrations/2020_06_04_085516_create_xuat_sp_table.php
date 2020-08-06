<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateXuatSpTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('xuat_sp', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('TenKH',255);
            $table->string('Diachi',255);
            $table->string('SDTKH',50);
            $table->integer('Soluongxuat');
            $table->date('Thoigianxuat');
            $table->string('Thanhtien',255);
            $table->integer('id_spxuat')->unsigned();
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
        Schema::dropIfExists('xuat_sp');
    }
}
