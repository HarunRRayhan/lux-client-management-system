<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create( 'companies', function ( Blueprint $table ) {
            $table->id();
            $table->string( 'name' );
            $table->string( 'website' )->nullable();
            $table->string( 'phone' )->nullable();
            $table->string( 'mobile' )->nullable();
            $table->string( 'vat_number' )->nullable();
            $table->text( 'terms' )->nullable();
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
        Schema::dropIfExists( 'companies' );
    }
}
