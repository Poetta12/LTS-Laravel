<?php

    namespace Database\Seeders;

    use Illuminate\Database\Seeder;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\File;

    class ProduitsSeeder extends Seeder
    {
        public function run(): void
        {
            $jsonPath = database_path('seeders/produits.json');
            $json = File::get($jsonPath);
            $data = json_decode($json);

            if (json_last_error() !== JSON_ERROR_NONE) {
                throw new \Exception('Erreur de décodage JSON : ' . json_last_error_msg());
            }

            if (!is_array($data)) {
                throw new \Exception('Le fichier JSON ne contient pas un tableau de produits.');
            }

            foreach ($data as $obj) {
                if (!isset($obj->nom, $obj->description, $obj->prix, $obj->quantite, $obj->poid, $obj->categories_id)) {
                    throw new \Exception('Données JSON manquantes pour l\'un des produits.');
                }

                DB::table('produits')->updateOrInsert(
                    ['nom' => $obj->nom],
                    [
                        'description' => $obj->description,
                        'prix' => $obj->prix,
                        'quantite' => $obj->quantite,
                        'poid' => $obj->poid,
                        'categories_id' => $obj->categories_id,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]
                );
            }

            $images = [
                'Reblochon' => 'Reblochon.jpeg',
                'Tomme de Savoie' => 'TOMME_DE_SAVOIE.jpg',
                'Diots' => 'Diots.jpeg',
                'Vins de Savoie' => 'Vins_de_Savoie.jpeg',
                'Crozet' => 'Crozet.jpeg',
                'Miel de Savoie' => 'Miel_de_Savoie.jpg',
            ];

            foreach ($images as $produitNom => $imageFileName) {
                DB::table('produits')->updateOrInsert(
                    ['nom' => $produitNom],
                    ['image' => 'products_img/' . $imageFileName]
                );
            }
        }
    }
