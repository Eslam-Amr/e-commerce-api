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

/*
Pending: The order has been placed but not yet processed.
Processing: The order is being prepared, packed, or otherwise worked on.
On Hold: The order is temporarily paused, often due to payment issues or stock verification.
Completed: The order has been fully processed, shipped, and delivered to the customer.
Cancelled: The order has been cancelled, either by the customer or the merchant.
Refunded: The order has been cancelled after payment was made, and a refund has been issued.
Failed: The order did not go through due to a payment failure or another error.
Shipped: The order has been dispatched and is on its way to the customer.
Out for Delivery: The order is out for final delivery to the customer's address.
Delivered: The order has been successfully delivered to the customer.
Returned: The customer has returned the order after delivery.
Partially Shipped: Some items in the order have been shipped, while others are still being processed.

*/

        Schema::create('checkouts', function (Blueprint $table) {
            $table->id();
            $table->decimal('total');
            $table->enum('status',['Pending','Processing','On Hold','Completed','Cancelled','Refunded','Failed','Shipped','Out for Delivery','Delivered','Returned','Partially'])->default('pending');
            $table->foreignId('user_id')->references('id')->on('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('seller_id')->references('id')->on('users')->cascadeOnDelete()->cascadeOnUpdate();
            // $table->foreignId('cart_id')->references('id')->on('carts')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('checkout_info_id')->references('id')->on('checkout_infos')->cascadeOnDelete()->cascadeOnUpdate();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('checkouts');
    }
};
