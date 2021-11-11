<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampaignTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaign', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('slug')->nullable();
            $table->bigInteger('category_id')->nullable();
            $table->bigInteger('user_id')->nullable();
            $table->string('campaign_name')->nullable();
            $table->bigInteger('location_id')->nullable();
            $table->string('thumbnail')->nullable();
            $table->longText('body')->nullable();
            $table->integer('target_amount')->nullable();
            $table->string('created_for')->nullable();
            $table->string('logo')->nullable();
            $table->date('publish_date')->nullable();
            $table->boolean('stop_limit')->nullable();
            $table->boolean('status')->default(0);
            $table->integer('minimum_tip')->default(0);
            $table->longText('search')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('campaign');
    }
}
