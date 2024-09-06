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
        Schema::disableForeignKeyConstraints();
        Schema::create('orders', static function (Blueprint $table) {
            $table->id();
            $table->foreignId('lastname_id')->constrained('users');
            $table->foreignId('name_id')->constrained('users');
            $table->foreignId('address_id')->constrained('users');
            $table->foreignId('address2_id')->constrained('users')->nullable;
            $table->foreignId('zipcode_id')->constrained('users');
            $table->foreignId('town_id')->constrained('users');
            $table->foreignId('email_id')->constrained('users');
            $table->foreignId('phone_id')->constrained('users');
            $table->foreignId('productname_id')->constrained('p_cart');
            $table->foreignId('productprice_id')->constrained('p_cart');
            $table->foreignId('productquantity_id')->constrained('p_cart');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
