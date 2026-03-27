<?php

namespace Modules\Custom\Database\Seeders;

use App\Models\Category;
use App\Models\City;
use App\Models\User;
use Illuminate\Database\Seeder;
use Modules\Custom\Database\Factories\PostFactory;

class PostSeeder extends Seeder
{
    private const COUNTRY_CODE = 'RS';
    private const CURRENCY_CODES = ['USD', 'EUR'];

    public function run(): void
    {
        $categories = Category::all();
        $cities = City::where('country_code', self::COUNTRY_CODE)
            ->pluck('id')
            ->toArray();
        $users = User::all()->pluck('id')->toArray();
        //dd($users);

        foreach ($categories as $category) {
            PostFactory::new()
                ->forUser($users[array_rand($users)])
                ->forCategory($category->id)
                ->forCity($cities[array_rand($cities)])
                ->forCurrency(array_rand(self::CURRENCY_CODES))
                ->count(2)
                ->create();
        }

    }
}
