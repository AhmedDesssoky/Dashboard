<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::updateOrCreate(['id'=>1],[
            'address' => 'Address 1',
            'phone' => '0101203032',
            'email' => 'Test@example.cm',
            'facebook' => 'Address 1',
            
        ]);
    }
}
