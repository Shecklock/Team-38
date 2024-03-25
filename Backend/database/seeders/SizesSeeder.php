<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Size;

class SizesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $clothesSize = ['XXS', 'XS', 'S', 'M', 'L', 'XL', 'XXL'];
        $shoeSize = [3, 3.5, 4, 4.5, 5, 5.5, 6, 6.5, 7, 7.5, 8, 8.5, 9, 9.5, 10, 10.5, 11, 11.5, 12, 12.5, 13];
        $oneSize = "one size";

        foreach($clothesSize as $data) {
            Size::create(['size' => $data]);
        }
        foreach ($shoeSize as $data) {
            $data = $data;
            Size::create(['size' => $data]);
        }
        Size::create(['size' => $oneSize]); 
    }
}
