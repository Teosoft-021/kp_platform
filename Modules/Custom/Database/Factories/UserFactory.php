<?php

namespace Modules\Custom\Database\Factories;

use App\Models\Country;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition(): array
    {
        return [
            'country_code' => 'RS',
            'language_code' => 'en',
            'user_type_id' => $this->faker->randomElement([1, 2]),
            'name' => $this->faker->name(),
            'about' => $this->faker->word(),
            'auth_field' => 'email',
            'email' => $this->faker->unique()->safeEmail(),
            'password' => bcrypt('password'),
            'email_verified_at' => Carbon::now(),
            'phone_verified_at' => Carbon::now(),
            'is_admin' => $this->faker->boolean(),
            'can_be_impersonated' => true,
            'create_from_ip' => $this->faker->ipv4(),
            'accept_terms' => $this->faker->boolean(),
        ];
    }
}
