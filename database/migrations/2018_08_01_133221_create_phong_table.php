<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhongTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phong', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ten')->nullable();
            $table->integer('khuvuc_id')->nullable();
            $table->integer('songuoi')->nullable();
            $table->string('tang')->nullable();
            $table->integer('dongia')->nullable();
            $table->longText('mota')->nullable();
            $table->enum('trangthai', array('Còn Trống','Đã Được Thuê','Đã Đặt Cọc','Đang Thuê Và Đã Đặt Cọc','Tạm Dừng Sử Dụng'))->nullable();
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
        Schema::dropIfExists('phong');
    }
}
