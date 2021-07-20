<?php

namespace Database\Seeders;

use App\Models\MotherTongueLanguage;
use Illuminate\Database\Seeder;

class MotherTongueLanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create 10
        MotherTongueLanguage::factory()->times(15)->create();
    }
}
