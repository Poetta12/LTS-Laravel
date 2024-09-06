<?php

    namespace Database\Factories;

    use Illuminate\Database\Eloquent\Factories\Factory;
    use App\Models\Produits;

    class ProduitsFactory extends Factory
    {

        protected $model = Produits::class;

        public function definition()
        {
            return [
                'nom' => $this->faker->word,
                'description' => $this->faker->sentence,
                'prix' => $this->faker->randomFloat(2, 10, 1000),
                'quantite' => $this->faker->numberBetween(1, 100),
                'poid' => $this->faker->randomFloat(2, 0.1, 10),
                'categories_id' => $this->faker->numberBetween(1, 10),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
    }
