<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class YearAboutPost extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('year_about_post', function (Blueprint $table) {
            $table->unsignedBigInteger('year_id');
            $table->unsignedBigInteger('about_post_id');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();

            $table->foreign('year_id')->references('id')->on('years')->onDelete('cascade');
            $table->foreign('about_post_id')->references('id')->on('about_posts')->onDelete('cascade');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
