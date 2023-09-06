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
        Schema::create('withdrawals', function (Blueprint $table) {
            $table->id();
            $table->string('reference');
            $table->unsignedBigInteger('user_id'); //the sender
            $table->string('amount')->default(0); 
            $table->string('method'); //card, bank, ussd  
            $table->string('status')->default('pending');// ,// successful, failed, cancelled ['paid','failed','pending','processing'])->index();
            $table->timestamp('approved_at')->nullable();
            $table->string('info')->nullable();
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
        Schema::dropIfExists('withdrawals');
    }
};
