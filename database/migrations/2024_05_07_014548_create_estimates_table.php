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
        Schema::create('estimates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('business_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('client_id')->nullable()->constrained()->onDelete('cascade');
            $table->string('number')->unique();
            $table->dateTime('date');
            $table->string('status');
            $table->dateTime('expires_at');
            $table->foreignId('currency_id')->nullable()->constrained()->onDelete('set null');
            $table->decimal('subtotal', 15, 2);
            $table->decimal('total', 15, 2);
            $table->string('purchase_order')->nullable();
            $table->string('expires_in');
            $table->longText('notes')->nullable();
            $table->longText('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estimates');
    }
};
