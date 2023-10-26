<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biodata', function (Blueprint $table) {
            $table->id('nik');
            $table->string('nama');
            $table->enum('role', ['admin', 'pegawai']);
            $table->enum('jenis_kelamin', ['L','P']);
            $table->bigInteger('nip')->nullable()->default(18);
            $table->string('password');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('status_perkawinan');
            $table->string('kartu_pegawai')->nullable();
            $table->date('TMT_KGB_terakhir');
            $table->string('kenaikan_KGB_YAD');
            $table->string('TMT_pensiun');
            $table->string('kode_pangkat');
            $table->string('kode_pendidikan');
            $table->rememberToken();
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
        Schema::dropIfExists('biodata');
    }
}
