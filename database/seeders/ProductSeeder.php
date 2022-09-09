<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert(array(
            array(
                'name' => 'Home Modern Chair',
                'photos' => 'home-modern-chair.jpg',
                'categories_id' => 2,
                'price' => 900000,
                'weight' => 1500.00,
                'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged',
                'slug' => 'home-modern-chair',
                'stock' => 15
            ),
            array(
                'name' => 'Floating Shelves Particle Board',
                'photos' => 'floating-shelves.jpg',
                'categories_id' => 1,
                'price' => 1200000,
                'weight' => 1500.00,
                'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged',
                'slug' => 'floating-shelves',
                'stock' => 15
            )
        ));
    }
}
