<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblVendor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_vendors_info', function (Blueprint $table) {
            $table->increments('vendor_id');
            $table->string('vendor');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('address');
            $table->string('email')->unique();
            $table->string('weburl');
            $table->string('contract');
            $table->string('category');
            $table->string('department');
            $table->date('effectivedate');
            $table->date('expirationdate');
            $table->integer('status');
            $table->string('cover_image');

            $table->longText('termination');
            $table->longText('payment');
            $table->longText('spend');
            $table->longText('penalty');
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
        Schema::dropIfExists('tbl_vendors_info');
    }
}
