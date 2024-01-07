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
            $table->foreignId('client_id')
                ->constrained('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreignId('provider_id')
                ->constrained('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreignId('package_id')
                ->constrained('service_packages')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreignId('state_id')
                ->constrained('order_states');
            $table->decimal('price', 15, 4);
            $table->integer('amount');
            $table->boolean('seen')->default(0);
            $table->tinyInteger('client_given_rate')->default(0);
            $table->tinyInteger('provider_given_rate')->default(0);
            $table->text('client_given_feedback')->nullable();
            $table->text('provider_given_feedback')->nullable();
            $table->boolean('start_delivery')->default(0);
            $table->boolean('files_uploaded')->default(0);
            $table->dateTime('accepted_at')->nullable();
            $table->dateTime('completed_at')->nullable();
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
