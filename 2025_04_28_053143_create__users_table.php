<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('staff_code')->unique();
            $table->string('name');
            $table->string('phone')->unique();
            $table->string('password');
            $table->unsignedBigInteger('role_id');
            $table->timestamps();

            // Khóa ngoại đến bảng roles
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
