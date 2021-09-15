<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrudIkansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crud_ikans', function (Blueprint $table) {
            $table -> id();
            $table -> integer('harga');
            $table -> string('jenis_ikan');
            $table -> text('penjual');
            $table -> timestamps();
            $table -> string('gambar');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('crud_ikans');
    }
}
