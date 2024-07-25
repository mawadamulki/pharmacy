<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MedicinesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //1.1
        DB::table("medicines")->insert([
            "scientific_name" => "Doxazosin",
            "commercial_name" => "Caryories",
            "classification" => "Hypotensive",
            "manufacturer" => "Alfares",
            "available_quantity" => "100",
            "expiration_date" => "2021-05-25T21:15:05",
            "price" => "2500",
        ]);

        //1.2
        DB::table("medicines")->insert([
            "scientific_name" => "Doxazosin",
            "commercial_name" => "Cardocer",
            "classification" => "Hypotensive",
            "manufacturer" => "Pharmacer",
            "available_quantity" => "100",
            "expiration_date" => "2021-05-25T21:15:05",
            "price" => "2500",
        ]);

        //1.3
        DB::table("medicines")->insert([
            "scientific_name" => "Doxazosin",
            "commercial_name" => "Cardura",
            "classification" => "Hypotensive",
            "manufacturer" => "Unipharma",
            "available_quantity" => "100",
            "expiration_date" => "2021-05-25T21:15:05",
            "price" => "1500",
        ]);

        //2.1
        DB::table("medicines")->insert([
            "scientific_name" => "Terazosin",
            "commercial_name" => "Prostanor",
            "classification" => "Hypotensive",
            "manufacturer" => "Alfares",
            "available_quantity" => "100",
            "expiration_date" => "2021-05-25T21:15:05",
            "price" => "12700",
        ]);

        //2.2
        DB::table("medicines")->insert([
            "scientific_name" => "Terazosin",
            "commercial_name" => "Itrin",
            "classification" => "Hypotensive",
            "manufacturer" => "Unipharma",
            "available_quantity" => "100",
            "expiration_date" => "2021-05-25T21:15:05",
            "price" => "2600",
        ]);

        //3.1
        DB::table("medicines")->insert([
            "scientific_name" => "Tasolosin",
            "commercial_name" => "Tasomax",
            "classification" => "Hypotensive",
            "manufacturer" => "Unipharma",
            "available_quantity" => "100",
            "expiration_date" => "2021-05-25T21:15:05",
            "price" => "6400",
        ]);

        //3.2
        DB::table("medicines")->insert([
            "scientific_name" => "Tasolosin",
            "commercial_name" => "Tasozor",
            "classification" => "Hypotensive",
            "manufacturer" => "Ibn Zuhr",
            "available_quantity" => "100",
            "expiration_date" => "2021-05-25T21:15:05",
            "price" => "8500",
        ]);

        /*****************************************************/

        //1.1
        DB::table("medicines")->insert([
            "scientific_name" => "Cetamol",
            "commercial_name" => "Uniadol",
            "classification" => "Painkillers",
            "manufacturer" => "Unipharma",
            "available_quantity" => "100",
            "expiration_date" => "2021-05-25T21:15:05",
            "price" => "3800",
        ]);

        //1.2
        DB::table("medicines")->insert([
            "scientific_name" => "Cetamol",
            "commercial_name" => "Cetamol",
            "classification" => "Painkillers",
            "manufacturer" => "Barakat",
            "available_quantity" => "100",
            "expiration_date" => "2021-05-25T21:15:05",
            "price" => "2100",
        ]);

        //1.3
        DB::table("medicines")->insert([
            "scientific_name" => "Cetamol",
            "commercial_name" => "Prodol",
            "classification" => "Painkillers",
            "manufacturer" => "Proline",
            "available_quantity" => "100",
            "expiration_date" => "2021-05-25T21:15:05",
            "price" => "5400",
        ]);

        //2.1
        DB::table("medicines")->insert([
            "scientific_name" => "Diclofenac",
            "commercial_name" => "Flamke",
            "classification" => "Painkillers",
            "manufacturer" => "Diamond Pharma",
            "available_quantity" => "100",
            "expiration_date" => "2021-05-25T21:15:05",
            "price" => "2900",
        ]);

        //2.2
        DB::table("medicines")->insert([
            "scientific_name" => "Diclofenac",
            "commercial_name" => "Diclon",
            "classification" => "Painkillers",
            "manufacturer" => "Ibn Hayyan",
            "available_quantity" => "100",
            "expiration_date" => "2021-05-25T21:15:05",
            "price" => "3200",
        ]);

        //2.3
        DB::table("medicines")->insert([
            "scientific_name" => "Diclofenac",
            "commercial_name" => "Diclofenac Hedman",
            "classification" => "Painkillers",
            "manufacturer" => "Hyuni Pharma",
            "available_quantity" => "100",
            "expiration_date" => "2021-05-25T21:15:05",
            "price" => "2800",
        ]);

        //3.1
        DB::table("medicines")->insert([
            "scientific_name" => "Celoxib",
            "commercial_name" => "Celoxib",
            "classification" => "Painkillers",
            "manufacturer" => "Ibn Zahr",
            "available_quantity" => "100",
            "expiration_date" => "2021-05-25T21:15:05",
            "price" => "3400",
        ]);

        //3.2
        DB::table("medicines")->insert([
            "scientific_name" => "Celoxib",
            "commercial_name" => "Coxept",
            "classification" => "Painkillers",
            "manufacturer" => "Ibn Alhaitham",
            "available_quantity" => "100",
            "expiration_date" => "2021-05-25T21:15:05",
            "price" => "3700",
        ]);

        //3.3
        DB::table("medicines")->insert([
            "scientific_name" => "Celoxib",
            "commercial_name" => "Silex",
            "classification" => "Painkillers",
            "manufacturer" => "Alpha",
            "available_quantity" => "100",
            "expiration_date" => "2021-05-25T21:15:05",
            "price" => "3400",
        ]);

        /*****************************************************/

        //1.1
        DB::table("medicines")->insert([
            "scientific_name" => "Unephrine",
            "commercial_name" => "Dusyavin",
            "classification" => "Antispasmodics",
            "manufacturer" => "Ibn Hayyan",
            "available_quantity" => "100",
            "expiration_date" => "2021-05-25T21:15:05",
            "price" => "2300",
        ]);

        //1.2
        DB::table("medicines")->insert([
            "scientific_name" => "Unephrine",
            "commercial_name" => "Homasyan",
            "classification" => "Antispasmodics",
            "manufacturer" => "Human",
            "available_quantity" => "100",
            "expiration_date" => "2021-05-25T21:15:05",
            "price" => "4000",
        ]);

        //1.3
        DB::table("medicines")->insert([
            "scientific_name" => "Unephrine",
            "commercial_name" => "Free Siaz",
            "classification" => "Antispasmodics",
            "manufacturer" => "Mercy Pharma",
            "available_quantity" => "100",
            "expiration_date" => "2021-05-25T21:15:05",
            "price" => "5000",
        ]);

        //2.1
        DB::table("medicines")->insert([
            "scientific_name" => "Pavirin",
            "commercial_name" => "Famas",
            "classification" => "Antispasmodics",
            "manufacturer" => "Masoud",
            "available_quantity" => "100",
            "expiration_date" => "2021-05-25T21:15:05",
            "price" => "3600",
        ]);

        //2.2
        DB::table("medicines")->insert([
            "scientific_name" => "Pavirin",
            "commercial_name" => "Spanderphrine",
            "classification" => "Antispasmodics",
            "manufacturer" => "Zmatmedica",
            "available_quantity" => "100",
            "expiration_date" => "2021-05-25T21:15:05",
            "price" => "3600",
        ]);

        //2.3
        DB::table("medicines")->insert([
            "scientific_name" => "Pavirin",
            "commercial_name" => "Hasiferin",
            "classification" => "Antispasmodics",
            "manufacturer" => "Alnawras",
            "available_quantity" => "100",
            "expiration_date" => "2021-05-25T21:15:05",
            "price" => "3600",
        ]);

        //3.1
        DB::table("medicines")->insert([
            "scientific_name" => "Drotaverine",
            "commercial_name" => "Anime Sia",
            "classification" => "Antispasmodics",
            "manufacturer" => "Bree",
            "available_quantity" => "100",
            "expiration_date" => "2021-05-25T21:15:05",
            "price" => "3000",
        ]);

        //3.2
        DB::table("medicines")->insert([
            "scientific_name" => "Drotaverine",
            "commercial_name" => "Drotaverine",
            "classification" => "Antispasmodics",
            "manufacturer" => "Al-Saad",
            "available_quantity" => "100",
            "expiration_date" => "2021-05-25T21:15:05",
            "price" => "2600",
        ]);

    }
}
