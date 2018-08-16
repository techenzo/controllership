<?php

use Illuminate\Database\Seeder;
use App\Vendor;
use App\User;
use App\Access;

class VendorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Vendor::create([
            'name' => 'Ingram Micro',
            'first_name' => 'Enzo',
            'last_name' => 'Turla',
            'address' => 'Taguig City',
            'email' => 'eliseo.turla@ingrammicro',
            'web_url' => 'www.ingrammicro.com',
            'contract_type' => 'General Purchase Agreement',
            'category_type' => 'Facility Management',
            'department' => 'Engagement',

            'effectivedate' => '2018-05-07',
            'expirationdate' => '2028-03-01',
            'status_id' => 1,
            'code' => 'IMGPA',
            'user_id' => 1,
        ]);

        User::create([
            'name' => 'Eliseo Jr M. Turla',
            'email' => 'eliseo.turla@gmail.com',
            'password' => 'password',
        ]);

        Access::create([
            'id' => 1,
            'ntid' => 'usture00',
            'access' => 1,
            'user_id' => 1,
        ]);
    }
}
