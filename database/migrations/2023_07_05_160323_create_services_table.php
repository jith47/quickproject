<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('ref_id', 255)->nullable();
            $table->string('email')->nullable();
            $table->integer('type')->nullable();
            $table->integer('service_for')->nullable();
            $table->integer('created_by')->nullable();
            $table->integer('report_id')->nullable();
            $table->integer('quote_id')->nullable();
            $table->integer('invoice_id')->nullable();
            $table->integer('company_id')->nullable();
            $table->date('closed_at')->nullable();
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
        Schema::dropIfExists('services');
    }
}
