<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password')->nullable();
            $table->string('provider_id')->nullable();
            $table->string('user_name')->nullable();
            $table->string('gender')->nullable();
            $table->string('month')->nullable();
            $table->string('day')->nullable();
            $table->string('pet')->nullable();
            $table->string('relationship')->nullable();
            $table->string('description')->nullable()->default('user description here.');
            $table->string('profile_pic')->nullable()->default('http://get.secret.jp/pt/file/1589531213.jpg');
            $table->string('cover_pic')->default('http://get.secret.jp/pt/file/1589527356.jpg');
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
