<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new  class extends Migration
    {
        /**
         * Run the migrations.
         */
        public function up(): void
        {
            Schema::create('p_cart', function (Blueprint $table) {
                $table->id();
                $table->foreignId('cart_id')->constrained('cart')->onDelete('cascade');
                $table->foreignId('product_id')->constrained('produits')->onDelete('cascade');
                $table->integer('quantity');
                $table->timestamps();
            });
        }

        /**
         * Reverse the migrations.
         */
        public function down(): void
        {
            Schema::dropIfExists('p_cart');
        }
    };
