<?php

namespace Modules\Custom\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Custom\Database\Factories\PostFactory;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        PostFactory::new()->count(50)->create();
    }
}
