<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use App\Item;

class ItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ini_set('memory_limit', -1);
        $faker = Faker::create();
        foreach (range(1, 10000000) as $index) {
        // for ($i = 0; $i < 100000; $i++) {
            Item::insert([
                'name' => $faker->name,
                'address' => $faker->address,
                'keywords' => str_replace(' ', ',', $faker->text)
            ]);
        }
    }
}
