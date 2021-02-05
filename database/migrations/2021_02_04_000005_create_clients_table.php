<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('company_name');
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('adresa_ulica')->nullable();
            $table->string('adresa_cislo')->nullable();
            $table->string('adresa_mesto')->nullable();
            $table->string('adresa_psc')->nullable();
            $table->string('kontaktna_osoba')->nullable();
            $table->string('osoba_phone')->nullable();
            $table->string('poznamka')->nullable();
            $table->string('ico')->nullable();
            $table->string('ic_dph')->nullable();
            $table->string('dic')->nullable();
            $table->string('banka')->nullable();
            $table->string('ucet')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
