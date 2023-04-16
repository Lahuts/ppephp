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
        Schema::create('Utilisateur', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->string('email')->unique();
            $table->string('sexe');
            $table->string('password');
            $table->string('pays');
            $table->string('ville');
            $table->date('date_naissance');
            $table->string('telephone');
            $table->string('url_photo');
            $table->string('pole');
            $table->timestamps();
        });

        DB::table('Utilisateur')->insert([
            [
            "nom"=>"Huet",
            "prenom"=>"Alexis",
            "email"=>"alexis.huet.m@gmail.com",
            "sexe"=>"Homme",
            "password"=>"admin",
            "pays"=>"France",
            "ville"=>"Paris",
            "date_naissance"=>"2002-01-01",
            "telephone"=>"0606060606",
            "url_photo"=>"./asset/alexis.jpg",
            "pole"=>"Informatique"
            ],
            [
            "nom"=>"Lahuts",
            "prenom"=>"Ale",
            "email"=>"ale.lahuts@gmail.com",
            "sexe"=>"Homme",
            "password"=>"admin",
            "pays"=>"France",
            "ville"=>"Paris",
            "date_naissance"=>"1998-01-01",
            "telephone"=>"06060232324",
            "url_photo"=>"./asset/ale.jpg",
            "pole"=>"Technique"
            ],
            [
            "nom"=>"Huezet",
            "prenom"=>"Alex",
            "email"=>"alex.huezet@gmail.com",
            "sexe"=>"Femme",
            "password"=>"admin",
            "pays"=>"France",
            "ville"=>"Paris",
            "date_naissance"=>"1998-02-09",
            "telephone"=>"06060232324",
            "url_photo"=>"./asset/alex.jpg",
            "pole"=>"Technique"
            ],
    ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('utilisateur');
    }
};
