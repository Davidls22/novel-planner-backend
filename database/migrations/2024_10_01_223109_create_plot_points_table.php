<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlotPointsTable extends Migration
{
    public function up()
    {
        Schema::create('plot_points', function (Blueprint $table) {
            $table->id();
            $table->foreignId('plot_arc_id')->constrained()->onDelete('cascade');
            $table->foreignId('chapter_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->text('description');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('plot_points');
    }
}
