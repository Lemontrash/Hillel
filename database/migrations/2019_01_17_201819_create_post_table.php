<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->char('pic')->default('http://placehold.it/750x300');
            $table->char('title');
            $table->longText('content');
            $table->timestamps();
            $table->softDeletes();
        });

        DB::table('posts')->insert(
            array(
                'user_id' => '1',
                'title' => 'buddy post',
                'content' => 'please sign up a new user',
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
        Schema::dropIfExists('posts');
    }
}
