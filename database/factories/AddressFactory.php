<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Ward;
use App\Models\Address;
use App\Models\District;
use App\Models\Province;
use Illuminate\Database\Eloquent\Factories\Factory;
use Buihuycuong\Vnfaker\VNFaker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Address::class;
    public function definition()
    {
        $type = ["office", "home"];
        $users = User::orderBy("id", "asc")->limit(11)->get();
        $user = collect($users)->random();
        $prov = Province::inRandomOrder()->first();
        $dist = District::where("_province_id", $prov->id)->inRandomOrder()->first();
        $ward = Ward::where("_province_id", $prov->id)->where('_district_id', $dist->id)->inRandomOrder()->first();
        $address = ["12 Group 1My Tho Town, Cao Lanh Township", "18T1, Trung Hoa Nhan Chinh Urban Area, Trung Hoa Street", "Highway 14, Duc Lap", "1068 Ta Quang Buu Street, Ward 6, Districts 8", "12 Group 1My Tho Town, Cao Lanh Township", "No. 308 Lanh Binh Thang, Ward 11, District 11", "No. 02 Tan Quang, Van Lam"];
        while (!$prov->_name || !$dist->_name || !$ward->_name) {
            $prov = Province::inRandomOrder()->first();
            $dist = District::where("_province_id", $prov->id)->inRandomOrder()->first();
            $ward = Ward::where("_province_id", $prov->id)->where('_district_id', $dist->id)->inRandomOrder()->first();
        }

        return [
            'user_id' => $user->id,
            "phone" => $user->phone,
            'name' => $user->name,
            'prov' => $prov->_name ?? null,
            'dist' => $dist->_name ?? null,
            'ward' => $ward->_name ?? null,
            "prov_id" => $prov->id ?? null,
            "dist_id" => $dist->id ?? null,
            "ward_id" => $ward->id ?? null,
            "type" => $type[array_rand($type, 1)],
            "detail" => $address[array_rand($address, 1)],
            "def" => false,
        ];
    }
}
