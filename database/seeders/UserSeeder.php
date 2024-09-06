<?php

    namespace Database\Seeders;

    use Illuminate\Database\Seeder;
    use App\Models\User;
    use Illuminate\Support\Facades\Hash;

    class UserSeeder extends Seeder
    {
        /**
         * Run the database seeds.
         */
        public function run()
        {
            // Créer 10 utilisateurs en utilisant la factory
            //User::factory()->count(10)->create();

            User::create([
                'name' => 'Test User',
                'lastname' => 'Doe',
                'birthday' => '1990-01-01',
                'gender' => 'M',
                'phone' => '1234567890',
                'address' => '123 Main St',
                'address2' => 'Apt 456',
                'zipcode' => '12345',
                'town' => 'Townsville',
                'country' => 'Countryland',
                'email' => 'testuser@example.com',
                'password' => Hash::make('0000'),
            ]);
        }
    }
