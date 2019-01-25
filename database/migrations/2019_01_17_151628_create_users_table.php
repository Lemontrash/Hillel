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
            $table->string('email', 250)->unique()->charset('utf8');
            $table->string('login', 250)->unique()->charset('utf8');
            $table->string('username', 250)->nullable()->default('anon');
            $table->string('password');
            $table->longText('pic')->nullable();
            $table->enum('role', ['user', 'admin']);
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken()->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        DB::table('users')->insert(
            array(
                'email' => 'buddy@sample.com',
                'login' => 'buddy',
                'password' => 'you cant login with this',
                'role' => 'user',
            )
        );

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
