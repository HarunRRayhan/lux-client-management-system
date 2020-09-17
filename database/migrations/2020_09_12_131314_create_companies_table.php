<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

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
            $table->foreignId( 'user_id' )->nullable()->index()->constrained()->nullOnDelete();
            $table->string( 'website' )->nullable();
            $table->string( 'phone' )->nullable();
            $table->string( 'mobile' )->nullable();
            $table->string( 'vat_number' )->nullable();
            $table->text( 'terms' )->nullable();
            $table->timestamps();
        } );

        // Full Text Search
        if ( 'sqlite' !== DB::getDefaultConnection() ) {
            DB::statement( '
                create fulltext index companies_fulltext_index
                on companies(name)
                with parser ngram
            ' );
        }
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
