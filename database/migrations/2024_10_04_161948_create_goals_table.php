<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('goals', function (Blueprint $table) {
        $table->id();
        $table->foreignId('novel_id')->constrained()->onDelete('cascade');
        $table->string('goal_type');
        $table->integer('target');
        $table->integer('current_progress')->default(0);
        $table->date('deadline')->nullable();
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('goals');
}
};
