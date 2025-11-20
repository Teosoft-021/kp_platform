<?php

namespace Modules\Custom\Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition(): array
    {
        return [
            'country_code' => 'RS',
            'user_id' => 1,
            'title' => $this->faker->word(),
            'category_id' => 10,
            'description' => $this->faker->text(),
            'price' => $this->faker->randomFloat(),
            'currency_code' => 'RSD',
            'negotiable' => $this->faker->boolean(),
            'contact_name' => $this->faker->name(),
            'city_id' => 85,
            'lon' => $this->faker->longitude(),
            'lat' => $this->faker->latitude(),
            'create_from_ip' => $this->faker->ipv4(),
            'auth_field' => 'email',
            'email' => $this->faker->unique()->safeEmail(),
            'phone_country' => 'rs',
            'email_verified_at' => Carbon::now()->subDay(),
            'phone_verified_at' => Carbon::now()->subDay(),
        ];
    }
}
