<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('assetable_id');
            $table->string('assetable_type');
            $table->string('type');
            $table->string('disk', 20);
            $table->string('visibility', 7);
            $table->unsignedInteger('sort')->default(1);
            $table->string('path');
            $table->string('original_name')->nullable();
            $table->string('extension', 8);
            $table->string('mime')->nullable();
            $table->unsignedBigInteger('size');
            $table->string('caption')->nullable();
            $table->json('variants');
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
        Schema::dropIfExists('assets');
    }
}
