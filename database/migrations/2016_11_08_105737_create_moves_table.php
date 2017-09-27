<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMovesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('moves', function (Blueprint $table) {
            $table->increments('id');
            $table->string('document', 100);
            $table->string('code_document', 10);
            $table->string('series', 20);
            $table->string('number', 20);
            $table->string('type_op', 10);
            $table->decimal('input', 15,4);
            $table->decimal('output', 15,4);
            $table->decimal('stock', 15,4);
            $table->integer('stock_id')->unsigned();
            $table->integer('unit_id')->unsigned();
            $table->decimal('value', 15,4);
            $table->boolean('change_value')->default(false);
            $table->decimal('avarage_value_before', 15,4);
            $table->decimal('avarage_value_after', 15,4);
            $table->string('document_model', 100);
            $table->string('document_id', 100);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('moves');
    }
}
