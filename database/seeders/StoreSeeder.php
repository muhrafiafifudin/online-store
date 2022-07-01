<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Store;

class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $store = [
            'name' => 'PT. Diva Metal Mandiri',
            'email' => 'divakitchensolo@gmail.com',
            'phone_number' => '+62 821 3567 8623',
            'street_address' => 'Jl. Mawar RT003/RW002',
            'provinces_id' => 9,
            'regencies_id' => 54,
            'postcode' => 16340,
            'maps' => 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15862.53234191291!2d107.000334!3d-6.3118381!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x5e24dacdb72086f2!2sPT%20Diva%20Metal%20Mandiri!5e0!3m2!1sen!2sid!4v1656313844347!5m2!1sen!2sid',
        ];

        Store::create($store);
    }
}
