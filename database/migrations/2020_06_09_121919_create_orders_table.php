<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')
                        ->onUpdate('cascade')
                        ->onDelete('set null');               

            $table->string('billing_email');
            $table->string('billing_name');
            $table->string('billing_address');
            $table->string('billing_city');
            $table->string('billing_province');
            $table->string('billing_phone');
            $table->string('billing_name_on_card');
            $table->integer('billing_discount')->default(0);
            $table->string('billing_discount_code')->nullable();
            $table->float('billing_subtotal', 10, 2);
            $table->float('billing_tax', 10, 2);
            $table->float('billing_total', 10, 2);
            $table->string('payment_gateway')->default('stripe');
            $table->boolean('shipped')->default(false);
            $table->string('error')->nullable();

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
        Schema::dropIfExists('orders');
    }
}
