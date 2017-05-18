<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CommentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // comment_id object_id author comment ip create_date registered rate reply_id status replay_nickname login_user_id country_code 

        Schema::create('external_comments', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('comment_external_id')->nullable();
            $table->integer('object_id')->nullable();
            $table->string('author')->nullable();
            $table->string('comment')->nullable();
            $table->string('ip')->nullable();
            $table->timestamp('create_date')->nullable();
            $table->timestamp('registered')->nullable();
            $table->integer('rate')->nullable();
            $table->integer('reply_id')->nullable();
            $table->string('status')->nullable();
            $table->string('replay_nickname')->nullable();
            $table->integer('login_user_id')->nullable();
            $table->integer('country_code');
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
        Schema::dropIfExists('external_comments');
    }
}
