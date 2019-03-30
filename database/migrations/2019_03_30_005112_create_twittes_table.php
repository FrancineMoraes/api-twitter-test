<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTwittesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('twittes', function (Blueprint $table) {
            $table->bigInteger('id');
            $table->string('created_at');
            $table->string('id_str');
            $table->longText('text');
            $table->boolean('truncated');
            $table->string('source');
            $table->string('in_reply_to_status_id');
            $table->string('in_reply_to_status_id_str');
            $table->string('in_reply_to_user_id');
            $table->string('in_reply_to_user_id_str');
            $table->string('in_reply_to_screen_name');
            $table->string('geo');
            $table->string('coordinates');
            $table->string('place');
            $table->string('contributors');
            $table->boolean('is_quote_status');
            $table->integer('retweet_count');
            $table->integer('favorite_count');
            $table->boolean('favorited');
            $table->boolean('retweeted');
            $table->boolean('possibly_sensitive');
            $table->string('lang');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('twittes');
    }
}
