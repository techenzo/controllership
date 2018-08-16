<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(VendorTableSeeder::class);
        $this->call(ContractTableSeeder::class);
        $this->call(TermsTableSeeder::class);
    }
}
