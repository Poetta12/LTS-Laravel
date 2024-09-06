<?php

    namespace Database\Factories;

    use Illuminate\Database\Eloquent\Factories\Factory;
    use Illuminate\Support\Facades\Hash;
    use Illuminate\Support\Str;
    use Illuminate\Support\Carbon;

    class UserFactory extends Factory
    {

        public function definition(): array
        {
            return [
                'name' => $this->faker->firstName,
                'lastname' => $this->faker->lastName,
                'birthday' => Carbon::now()->subYears(rand(18, 65))->subDays(rand(0, 365)),
                'gender' => $this->faker->randomElement(['M', 'F']),
                'phone' => $this->faker->phoneNumber,
                'address' => $this->faker->streetAddress,
                'address2' => $this->faker->secondaryAddress,
                'zipcode' => $this->faker->postcode,
                'town' => $this->faker->city,
                'country' => 'France',
                'email' => $this->faker->unique()->safeEmail,
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
            ];
        }

        public function unverified(): static
        {
            return $this->state(fn (array $attributes) => [
                'email_verified_at' => null,
            ]);
        }
    }
