<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamp('created_at')->useCurrent();
            $table->string('ISBN')->unique();
            $table->string('title');
            $table->string('thumbnail');
            $table->string('sample');
            $table->integer('author');
            $table->year('publish_year');
            $table->integer('publisher');
            $table->integer('genre');
            $table->integer('language');
            $table->integer('page_count');
            $table->string('description');
            $table->tinyInteger('can_order');
            $table->tinyInteger('can_preorder');
            $table->integer('in_stock');
            $table->integer('price');
            $table->integer('discount');
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
