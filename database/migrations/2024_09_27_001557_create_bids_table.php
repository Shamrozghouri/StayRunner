<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('bids', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('product_id')->nullable()->constrained('products')->cascadeOnDelete();
            $table->string('what_you_need');
            $table->string('email');
            $table->string('city');
            $table->string('delivery_address');
            $table->string('name');
            $table->text('special_instructions')->nullable();
            $table->decimal('price', 10, 2);
            $table->enum('payment_type', ['Cash', 'Online Banking']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('bids');
    }
};
