<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBankDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bank_detail', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('campaign_id')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('bank_branch')->nullable();
            $table->string('acc_type')->nullable();
            $table->string('routing_number')->nullable();
            $table->string('acc_number')->nullable();
            $table->string('bic_swift')->nullable();
            $table->string('acc_holder_name')->nullable();
            $table->string('recipient_address')->nullable();
            $table->string('transfer_reason')->nullable();
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
        Schema::dropIfExists('bank_detail');
    }
}
