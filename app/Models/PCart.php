<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Relations\BelongsTo;

    class PCart extends Model
    {
        protected $table = 'p_cart'; // Assurez-vous que le nom de la table est correct

        protected $fillable = ['cart_id', 'produit_id', 'quantity']; // Mettez à jour les noms des colonnes ici

        public function produit(): BelongsTo
        {
            return $this->belongsTo(Product::class, 'produit_id'); // Assurez-vous que 'produit_id' est correct
        }

        public function cart(): BelongsTo
        {
            return $this->belongsTo(Cart::class, 'cart_id'); // Assurez-vous que 'cart_id' est correct
        }
    }
