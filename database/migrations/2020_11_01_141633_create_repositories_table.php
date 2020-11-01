<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRepositoriesTable extends Migration
{
    public function up()
    {
        Schema::create('repositories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('repository_id')->nullable(false);
            $table->foreignId('tag_id')->nullable(false)->constrained();
            $table->foreignId('user_id')->nullable(false)->constrained();
            $table->unique('repository_id', 'tag_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('repositories');
    }
}
