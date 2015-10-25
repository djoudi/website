<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAwesomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('awesomes', function (Blueprint $table) {
            $table->increments('id');

            $table->string('title');
            $table->string('slug');
            $table->string('image')->default('images/list_placeholder.png')->nullable();
            $table->string('thumbnail')->default('images/list_placeholder_thumb.png')->nullable();
            $table->text('content');
            $table->text('topic')->nullable();
            $table->string('url');

            $table->string('author')->nullable();
            
            $table->boolean('approved')->default('0');

            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->softDeletes();
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
        Schema::drop('awesomes');
    }
}
