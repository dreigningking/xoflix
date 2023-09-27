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
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('payment_id');
            $table->string('m3u_link');
            $table->string('username');
            $table->string('password');
            $table->text('link_id');
            $table->text('panel_id');
            $table->timestamp('start_at');
            $table->timestamp('end_at');
            $table->timestamps();
        });
    }

    
    public function down(){
        Schema::dropIfExists('tasks');
    }
};
