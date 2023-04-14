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
        Schema::create('account', function (Blueprint $table) {
            $table->id('virtual_accounts_id')->unique();
            $table->string('virtual_account_number')->unique();
            $table->string('virtual_account_ifsc_code');
            $table->string('name');
            $table->string('primary_contact');
            $table->string('email_id');
            $table->string('landline_number');
            $table->string('mobile_number');
            $table->string('balance');
            $table->timestamps();
            $table->foreignId('users_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('account');
    }
};
