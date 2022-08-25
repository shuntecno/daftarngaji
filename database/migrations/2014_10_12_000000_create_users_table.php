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
        Schema::create('users', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->string('nama');
            $table->string('email');
            $table->date('tanggal_lahir');
            $table->string('tempat_lahir');
            $table->enum('seks', ['L', 'P']);
            $table->string('alamat');
            $table->string('no_telp')->nullable();
            $table->string('no_ktp');
            $table->string('foto_ktp');
            $table->string('level')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
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
        Schema::dropIfExists('users');
    }
}
