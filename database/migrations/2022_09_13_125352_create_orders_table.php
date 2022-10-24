<?php

use App\Models\Booking;
use App\Models\Item;
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
            $table->foreignIdFor(Item::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Booking::class)->constrained()->cascadeOnDelete();
            $table->date('orderdate') ;
            $table->float('qty',10,2) ;
            $table->float('cost',10,2);
            $table->string('status',10) ;
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
