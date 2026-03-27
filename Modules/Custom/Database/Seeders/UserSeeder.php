<?php

namespace Modules\Custom\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Custom\Database\Factories\UserFactory;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        UserFactory::new()->count(5)->create();
    }
}
