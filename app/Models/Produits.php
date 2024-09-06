<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Produits extends Model
{

    protected $table = 'produits'; // Spécifiez le nom correct de la table
    use HasFactory;


    protected $fillable = [
        'nom', 'prix', 'quantite', 'poid', 'description', 'categories_id', 'image',
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->image)) {
                $model->image = 'products_img/no_image.jpg';
            }
        });

        static::updating(function ($model) {
            if (empty($model->image)) {
                $model->image = 'products_img/no_image.jpg';
            }
        });
    }

    public static function find(string $id) {}

    public function categories(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function pCart(): HasMany
    {
        return $this->hasMany(PCart::class);
    }
}
