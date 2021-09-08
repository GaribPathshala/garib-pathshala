<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donations', function (Blueprint $table) {
            $table->id();
            $table->string('donation_id')->unique();
            $table->string('donor_name');
            $table->string('mobile_number');
            $table->string('email_id');
            $table->string('amount');
            $table->string('currency');
            $table->string('txn_status');
            $table->string('txn_date');
            $table->string('resp_code');
            $table->string('resp_msg');
            $table->string('txn_id');
            $table->string('bank_txn_id');
            $table->string('gateway_name');
            $table->string('bank_name');
            $table->string('pg');
            $table->string('download_key')->nullable();
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
        Schema::dropIfExists('donations');
    }
}
