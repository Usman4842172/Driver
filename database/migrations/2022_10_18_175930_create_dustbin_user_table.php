<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dustbin_user', function (Blueprint $table) {
//            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('dustbin_id');
            $table->string('status')->nullable();
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade');
            $table->foreign('dustbin_id')->references('id')->on('dustbins')
                ->onDelete('cascade');
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
        Schema::dropIfExists('dustbin_user');
    }
};
