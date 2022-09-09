<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert(array(
            array(
                'category' => 'Table'
            ),
            array(
                'category' => 'Wall Decoration'
            ),
            array(
                'category' => 'Chair'
            ),
            array(
                'category' => 'Building'
            ),
            array(
                'category' => 'Door'
            ),
            array(
                'category' => 'Under Stair'
            ),
            array(
                'category' => 'Cupboard'
            )
        ));
    }
}
