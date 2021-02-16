<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChartsArchiveTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('charts_archive', function (Blueprint $table) {
            $table->id();

            $table->string('chart_type');
            $table->integer('organization_id')->nullable();
            $table->string('date_from')->nullable();
            $table->string('date_to')->nullable();
            $table->text('result');

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
        Schema::dropIfExists('charts_archive');
    }
}
