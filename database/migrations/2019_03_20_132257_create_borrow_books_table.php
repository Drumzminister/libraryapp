<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBorrowBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('borrow_books', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('library_id');
            $table->integer('library_section_id');
            $table->integer('book_id');
            $table->date('return_date')->default(\Carbon\Carbon::now()->addWeeks(2));
            $table->boolean('returned')->default(0);
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
        Schema::dropIfExists('borrow_books');
    }
}
