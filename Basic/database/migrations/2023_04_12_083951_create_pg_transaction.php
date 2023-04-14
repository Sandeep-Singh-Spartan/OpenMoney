<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pgTransaction', function (Blueprint $table) {
            $table->id('pg_transaction_id')->unique();
            $table->string('amount');
            $table->string('currency');
            $table->string('mtx')->unique();
            $table->Integer('attempts');
            $table->string('sub_accounts_id');
            $table->string('entity');
            $table->string('status');
            $table->string('customer_contact_number');
            $table->string('customer_email_id');
            $table->string('customer_id');
            $table->string('customer_entity');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pgTransaction');
    }
};
