<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedTinyInteger('catid');
            $table->unsignedTinyInteger('suppid');
            $table->string('name');
            $table->string('slug');
            $table->string('img');
            $table->float('price');
            $table->float('pricesale');
            $table->unsignedTinyInteger('number');
            $table->longText('detail');
            $table->string('metakey');
            $table->string('metadesc');

            $table->unsignedTinyInteger('created_by');
            $table->unsignedTinyInteger('updated_by')->nullable();
            $table->unsignedTinyInteger('status')->default(0);
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
        Schema::dropIfExists('products');
    }
};
