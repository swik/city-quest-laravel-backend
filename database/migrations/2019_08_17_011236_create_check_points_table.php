<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCheckPointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'check_points',
            function (Blueprint $table) {
                $table->id();
                $table->integer('step');
                $table->foreignId('place_id')
                    ->references('id')
                    ->on('places');
                $table->foreignId('quest_id')
                    ->references('id')
                    ->on('quests');
                $table->foreignId('achievement_id')
                    ->nullable()
                    ->references('id')
                    ->on('achievements');
                $table->timestamps();
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('check_points');
    }
}
