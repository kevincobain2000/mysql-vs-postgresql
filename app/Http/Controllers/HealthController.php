<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Faker\Factory as Faker;
use App\Item;

class HealthController extends Controller
{
    public function __construct(Item $item)
    {
        $this->item = $item;
    }

    public function index(Request $request)
    {
        return response()->json(true);
    }

    public function count(Request $request)
    {
        return response()->json($this->item->count());
    }

    public function paginate(Request $request)
    {
        return response()->json($this->item->paginate());
    }

    public function find(Request $request)
    {
        return response()->json($this->item->find(rand(1, 10000)));
    }

    public function insert(Request $request)
    {
        $faker = Faker::create();
        $ret = $this->item->insert([
            'name' => $faker->name,
            'address' => $faker->address,
            'keywords' => str_replace(' ', ',', $faker->text)
        ]);
        return response()->json($ret);
    }

    public function update(Request $request)
    {
        $faker = Faker::create();
        $item = $this->item->find(rand(1, 10000));
        $item->name = $faker->name;
        $item->address = $faker->address;
        $item->save();
        return response()->json($item);
    }

    public function whereLike(Request $request)
    {
        $faker = Faker::create();
        $items = $this->item->where('name', 'like', $faker->name . '%')->get();
        return response()->json($items);
    }

    public function whereIn(Request $request)
    {
        $faker = Faker::create();
        for ($i = 0; $i < 10; $i++) {
            $names[] = $faker->name;
        }
        $items = $this->item->whereIn('name', $names)->get();
        return response()->json($items);
    }
}
