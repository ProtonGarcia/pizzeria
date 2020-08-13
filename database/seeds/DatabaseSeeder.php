<?php

use App\Order;
use App\Product;
use App\Restaurant;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        User::truncate();
        Product::truncate();
        Order::truncate();
        Restaurant::truncate();

        $usuarios = 1000;
        $productos = 30;
        $ordenes = 1000;
        $restaurantes = 10;

        factory(User::class, $usuarios)->create();
        factory(Product::class, $productos)->create();
        factory(Order::class, $ordenes)->create();
        factory(Restaurant::class, $restaurantes)->create();

    }
}
