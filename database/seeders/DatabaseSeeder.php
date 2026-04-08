<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'category_id' => 1,
                'category_name' => 'Sneakers',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'category_id' => 2,
                'category_name' => 'Sports',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
        ]);

        DB::table('products')->insert([
            [
                'product_id' => 1,
                'category_id' => 1,
                'product_name' => 'Nike Air Force 1',
                'product_price' => 100000,
                'product_stock' => 10,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
    
    }
}
