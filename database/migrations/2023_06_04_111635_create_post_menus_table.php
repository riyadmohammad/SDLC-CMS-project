<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_menus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('url_id')->nullable();
            $table->text('description')->nullable();
            $table->string('cover_image')->nullable();
            $table->string('page_image')->nullable();
            $table->tinyInteger('cover_image_status')->nullable();
            $table->tinyInteger('page_image_status')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->dateTime('deleted_at')->nullable();
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
        Schema::dropIfExists('post_menus');
    }
}
