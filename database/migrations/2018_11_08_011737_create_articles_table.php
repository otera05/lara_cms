<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'articles', function (Blueprint $table) {
                $table->increments('article_id');
                $table->string('title');
                $table->text('body');
                // $table->integer('category_id');
                // $table->integer('tag_id');
                // $table->integer('author_id');
                // $table->foreign('category_id')->references('category_id')->on('categories');
                // $table->foreign('tag_id')->references('tag_id')->on('tags');
                // $table->foreign('author_id')->references('author_id')->on('authors');
                $table->softDeletes();
                $table->timestamps();
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
