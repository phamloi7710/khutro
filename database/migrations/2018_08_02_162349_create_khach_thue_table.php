<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKhachThueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('khachthue', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->nullable();
            $table->string('ten')->nullable();
            $table->string('sodienthoai')->nullable();
            $table->integer('ngaysinh')->nullable();
            $table->enum('gioitinh', array('Nam','Nữ','Khác'))->nullable();
            $table->string('cmnd')->nullable();
            $table->integer('ngaycap')->nullable();
            $table->string('noicap')->nullable();
            $table->longText('hokhau')->nullable();
            $table->string('nghenghiep')->nullable();
            $table->string('noicongtac')->nullable();
            $table->string('sodienthoailienhe')->nullable();
            $table->string('anhdaidien')->nullable();
            $table->string('cmndmattruoc')->nullable();
            $table->string('cmndmatsau')->nullable();
            $table->integer('ngaybatdautamtru')->nullable();
            $table->integer('ngayketthuctamtru')->nullable();
            $table->longText('lydotamtru')->nullable();
            $table->enum('daidienphong', array('true','false'))->default('false');
            $table->integer('phong_id')->nullable();
            $table->integer('khuvuc_id')->nullable();
            $table->text('ghichu')->nullable();
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
        Schema::dropIfExists('khachthue');
    }
}
