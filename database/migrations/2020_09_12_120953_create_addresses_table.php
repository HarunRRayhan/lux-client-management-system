<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create( 'addresses', function ( Blueprint $table ) {
            $table->id();
            $table->string( 'street' );
            $table->string( 'line_2' )->nullable();
            $table->string( 'city' );
            $table->string( 'state' );
            $table->string( 'country' );
            $table->string( 'zip' );
            $table->morphs( 'addressable' );
            $table->timestamps();
        } );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists( 'addresses' );
    }
}
