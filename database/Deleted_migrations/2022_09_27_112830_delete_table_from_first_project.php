<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DeleteTableFromFirstProject extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('posts');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title'); //макс ограничение символов строки 255
            $table->string('post_content');
            $table->string('image')->nullable();
            $table->unsignedBigInteger('likes')->nullable(); //не будет отрицательного знака + выделяет дофига памяти + мб пустым значением.
            $table->boolean('is_published')->default(1);
            $table->timestamps();

            $table->softDeletes();
        });
    }
}
