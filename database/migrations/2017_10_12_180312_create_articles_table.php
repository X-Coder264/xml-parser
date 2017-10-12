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
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ArticleID');
            $table->text('Title');
            $table->string('SupplierArticleID')->nullable();
            $table->string('BarCode')->nullable();
            $table->string('ClassI');
            $table->string('ClassII')->nullable();
            $table->string('ClassIII')->nullable();
            $table->text('ArticleDescription')->nullable();
            $table->string('PictureURL')->nullable();
            $table->decimal('Length');
            $table->decimal('Width');
            $table->decimal('Height');
            $table->decimal('BruttoVolume', 11);
            $table->decimal('DiscountPercent');
            $table->decimal('DiscountPercent2');
            $table->string('Stock');
            $table->decimal('Price');
        });
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
