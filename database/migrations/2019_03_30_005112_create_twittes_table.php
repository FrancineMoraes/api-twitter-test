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
            $table->string('created');
            $table->string('id_str');
            $table->longText('text');
            $table->boolean('truncated');
            $table->string('source');
            $table->string('in_reply_to_status_id')->nullable();
            $table->string('in_reply_to_status_id_str')->nullable();
            $table->string('in_reply_to_user_id')->nullable();
            $table->string('in_reply_to_user_id_str')->nullable();
            $table->string('in_reply_to_screen_name')->nullable();
            $table->string('geo')->nullable();
            $table->string('coordinates')->nullable();
            $table->string('place')->nullable();
            $table->string('contributors')->nullable();
            $table->boolean('is_quote_status');
            $table->integer('retweet_count');
            $table->integer('favorite_count');
            $table->boolean('favorited');
            $table->boolean('retweeted');
            $table->boolean('possibly_sensitive');
            $table->string('lang')->default('en');
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
        Schema::dropIfExists('twittes');
    }
}
