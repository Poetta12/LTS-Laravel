<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Relations\HasMany;

    class Cart extends Model
    {
        protected $fillable = ['user_id'];

        public function user()
        {
            return $this->belongsTo(User::class);
        }

        public function products()
        {
            return $this->hasMany(PCart::class);
        }
    }

