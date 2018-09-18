<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKnowledgeArticleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('knowledge_article', function (Blueprint $table) {
            $table->increments('knowledge_article_id')->unique();
            $table->integer('knowledge_category_id');
            $table->integer('sub_knowledge_category_id');
            $table->string('knowledge_article_title');
            $table->date('knowledge_article_date');
            $table->text('knowledge_article_content');
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
        Schema::dropIfExists('knowledge_article');
    }
}
