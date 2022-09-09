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
                'qty' => 10
            ),
            array(
                'name' => 'Floating Shelves Particle Board',
                'photos' => 'floating-shelves.jpg',
                'categories_id' => 1,
                'price' => 132000,
                'weight' => 1500.00,
                'description' => 'FLOATING SHELVES : Wall shelf suitable for indoor or outdoor installation, Easy to install and comes with a product installation guide, Made of aluminum which is durable and easy to clean because the product is waterproof and termite resistant, Available in various colors and sizes.',
                'slug' => 'floating-shelves',
                'qty' => 10
            ),
            array(
                'name' => 'Floor Drain',
                'photos' => 'floor-drain.jpg',
                'categories_id' => 4,
                'price' => 210000,
                'weight' => 500.00,
                'description' => 'FLOOR DRAIN STAINLESS STEEL : Stainless steel material, Made for the bathroom so that water from the sewer does not enter, Guaranteed 100% water will not enter / seep, Under normal conditions, animals cannot enter, the smell from the sewer does not enter, Able to withstand flooding, water does not enter the house, Can be used for bathrooms, laundry areas/laundry rooms, and sinks/dishwashing sinks',
                'slug' => 'floor-drain',
                'qty' => 10
            ),
            array(
                'name' => 'Waterproof Alumunium Stair Cabinets',
                'photos' => 'alumunium-stair-cabinet.jpg',
                'categories_id' => 6,
                'price' => 3000000,
                'weight' => 500.00,
                'description' => 'Cabinets under stairs made of Aluminum Composite Panel (ACP) and coated with HPL for color/finishing are highly recommended and there is no doubt.',
                'slug' => 'alumunium-stair-cabinet',
                'qty' => 10
            ),
            array(
                'name' => 'Wire Door',
                'photos' => 'wire-door.jpg',
                'categories_id' => 5,
                'price' => 4600000,
                'weight' => 500.00,
                'description' => 'Size: (L) 101 cm x (H) 245 cm, Black, Frame/Sill: Aluminum',
                'slug' => 'wire-door',
                'qty' => 10
            ),
            array(
                'name' => 'Alumunium Nakas',
                'photos' => 'nakas.jpg',
                'categories_id' => 7,
                'price' => 4600000,
                'weight' => 500.00,
                'description' => 'Termite wardrobe made of Aluminum Composite Panel (ACP) and coated with HPL for color/finishing are highly recommended and there is no doubt.',
                'slug' => 'alumunium-nakas',
                'qty' => 10
            ),
            array(
                'name' => 'Termite Wardrobe',
                'photos' => 'termite-wardrobe.jpg',
                'categories_id' => 7,
                'price' => 750000,
                'weight' => 500.00,
                'description' => 'Termite wardrobe made of Aluminum Composite Panel (ACP) and coated with HPL for color/finishing are highly recommended and there is no doubt.',
                'slug' => 'termite-wardrobe',
                'qty' => 10
            ),
            array(
                'name' => 'Shelving Laptop',
                'photos' => 'shelving-laptop.jpg',
                'categories_id' => 1,
                'price' => 180000,
                'weight' => 500.00,
                'description' => 'Wall shelf suitable for indoor or outdoor installation, Easy to install and comes with a product installation guide, Made of aluminum which is durable and easy to clean because the product is waterproof and termite resistant, Available in various colors and sizes.',
                'slug' => 'shelving-laptop',
                'qty' => 10
            )
        ));
    }
}
