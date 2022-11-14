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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedTinyInteger('topicid')->nullable();
            $table->string('title');
            $table->longText('content');
            $table->string('img');
            $table->string('posttype')->default('post');
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
        Schema::dropIfExists('posts');
    }
};
