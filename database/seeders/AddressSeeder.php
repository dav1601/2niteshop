<?php

namespace Database\Seeders;

use App\Models\Address;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Address::truncate();
        Address::factory()->count(10)->create();
        $address = collect(Address::all())->groupBy("user_id");
        foreach ($address as $key => $value) {
            Address::where("id", $value[0]->id)->update(['def' => true]);
        }
    }
}
