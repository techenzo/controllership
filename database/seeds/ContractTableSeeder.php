<?php

use Illuminate\Database\Seeder;
use App\Contract;

class ContractTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Contract::create([
            'type' => 'Contract',
            'value' => 'Master Service Agreement',
            'code' => 'IMMSA',
        ]);

        Contract::create([
            'type' => 'Contract',
            'value' => 'General Purchase Agreement',
            'code' => 'IMGPA',
        ]);
        Contract::create([
            'type' => 'Contract',
            'value' => 'Non Disclosure Agreement',
            'code' => 'IMNDA',
        ]);

        Contract::create([
            'type' => 'Contract',
            'value' => 'License Agreement',
            'code' => 'IMLA',
        ]);
        
        Contract::create([
            'type' => 'Contract',
            'value' => 'Master Service Agreement',
            'code' => 'IMMSA',
        ]);

        Contract::create([
            'type' => 'Category',
            'value' => 'Real Estate',
            
        ]);
        
        Contract::create([
            'type' => 'Category',
            'value' => 'Facility Management',
        
        ]);
        
        Contract::create([
            'type' => 'Category',
            'value' => 'Cars',
            
        ]);
        
        Contract::create([
            'type' => 'Category',
            'value' => 'Human Resources',
        
        ]);

        Contract::create([
            'type' => 'Category',
            'value' => 'Professional Services',
            
        ]);
        
        Contract::create([
            'type' => 'Category',
            'value' => 'Travel',
        
        ]);

        Contract::create([
            'type' => 'Department',
            'value' => 'Recruitment',
            
        ]);

        Contract::create([
            'type' => 'Department',
            'value' => 'Engagement',
            
        ]);

        Contract::create([
            'type' => 'Department',
            'value' => 'Benefits & Compensation',
            
        ]);

        Contract::create([
            'type' => 'Department',
            'value' => 'Training Development',
            
        ]);
        
        
    }
}
