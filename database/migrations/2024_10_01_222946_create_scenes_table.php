<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScenesTable extends Migration
{
    public function up()
    {
        Schema::create('scenes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('chapter_id')->constrained()->onDelete('cascade');
            $table->text('situation');
            $table->text('task');
            $table->text('action');
            $table->text('result');
            $table->string('conflict_type')->nullable();
            $table->text('emotional_beat')->nullable();
            $table->text('scene_goal')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('scenes');
    }
}
