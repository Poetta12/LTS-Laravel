<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\Eloquent\Builder;

class Category extends Model
{
    public $timestamps = false;

    use HasFactory;

    protected $fillable = ['name'];


    public function products(): HasMany
    {
        return $this->hasMany(Produits::class, 'categories_id');
    }
}
