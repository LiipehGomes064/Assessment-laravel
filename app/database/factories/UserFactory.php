<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition()
    {
        return [
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'age' => $this->faker->numberBetween(18, 99),
            'phone' => $this->faker->phoneNumber(),
            'address' => $this->faker->address(),
            'professional_summary' => $this->faker->sentence(),
            'image' => $this->faker->imageUrl(),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => bcrypt('password'),
            'usertype' => $this->faker->boolean(),
        ];
    }
}

