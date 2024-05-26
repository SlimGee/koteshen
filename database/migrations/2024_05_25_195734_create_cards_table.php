<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cards', function (Blueprint $table) {
            $table->id();
            $table->string('authorization_code');
            $table->string('card_type');
            $table->string('brand');
            $table->string('last4');
            $table->string('exp_month');
            $table->string('exp_year');
            $table->string('bin')->nullable();
            $table->string('bank')->nullable();
            $table->string('channel')->nullable();
            $table->string('signature')->unique();
            $table->boolean('reusable');
            $table->string('country_code');
            $table->string('account_name')->nullable();
            $table->string('receiver_bank_account_number')->nullable();
            $table->string('receiver_bank')->nullable();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('email');
            $table->boolean('default')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cards');
    }
};
