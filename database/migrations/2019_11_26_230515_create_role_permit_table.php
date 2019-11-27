<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolePermitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_permit', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('role_id');
            $table->foreign('role_id')->references('id')->on('role')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedInteger('permit_id');
            $table->foreign('permit_id')->references('id')->on('permit')->onDelete('restrict')->onUpdate('restrict');            
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
        Schema::dropIfExists('role_permit');
    }
}
