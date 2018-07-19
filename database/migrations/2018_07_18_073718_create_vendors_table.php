<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVendorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('address')->nullable();
            $table->string('email')->unique();
            $table->string('web_url')->nullable();
            $table->string('contract_type')->nullable();
            $table->string('category_type')->nullable();
            $table->string('department')->nullable();
            $table->date('effectivedate')->nullable();
            $table->date('expirationdate')->nullable();
            $table->unsignedInteger('status_id')->nullable();
            $table->unsignedInteger('user_id');
            $table->longText('termination')->nullable();
            $table->longText('payment')->nullable();
            $table->longText('spend')->nullable();
            $table->longText('penalty')->nullable();
            $table->string('code');
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
        Schema::dropIfExists('vendors');
    }
}
