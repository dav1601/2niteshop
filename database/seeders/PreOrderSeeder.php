<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PreOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\PreOrder::factory(20)->create();
    }
}
