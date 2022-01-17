<?php

namespace Database\Seeders;

use App\Http\Controllers\UserController;
use App\Models\Address;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Address::create([
            "name"=>"Москва"
        ]);
        Address::create([
            "name"=>"Челябинск"
        ]);
        Address::create([
            "name"=>"Питер"
        ]);
        User::create([
            "name"=>"admin",
            "login"=>"admin",
            "email"=>"admin@a",
            "password"=>Hash::make('admin'),
            "isAdmin"=>1,
        ]);
        User::create([
            "name"=>"user",
            "login"=>"user",
            "email"=>"user@u",
            "password"=>Hash::make('user'),
            "isAdmin"=>0,
        ]);
//        Product::create([
//           "name"=>"Горный Forvard",
//           "photo"=>"https://www.velopiter.ru/vlp/cache/preview/max2000/c04/c04a373d26c6148ad2bcd7cda8c0fa7b.jpg",
//           "description"=>"Горный Forvard, предназначен для горных местностей, имеет много скоростей и не нуждается в частом обслуживании",
//           "price"=>"19000",
//           "weight"=>"2",
//        ]);
//        Product::create([
//            "name"=>"Обычный Forvard",
//            "photo"=>"https://craftsport.ru/wp-content/uploads/2020/04/264922.970.jpg",
//            "description"=>"Обычный Forvard, предназначен для города, имеет мало сокростей, но очень устойчив на дорогах",
//            "price"=>"14000",
//            "weight"=>"3",
//        ]);
    }
}
