<?php

    namespace App\Models;

    use Laravel\Sanctum\HasApiTokens;
    use Illuminate\Foundation\Auth\User as Authenticatable;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class User extends Authenticatable
    {
        use HasApiTokens, HasFactory;

        // Les attributs qui peuvent être remplis massivement
        protected $fillable = [
            'name',
            'lastname',
            'birthday',
            'gender',
            'phone',
            'address',
            'address2',
            'zipcode',
            'town',
            'country',
            'email',
            'password',
        ];

        // Les attributs cachés pour les tableaux
        protected $hidden = [
            'password',
            'remember_token',
        ];

        // Les attributs à convertir en types natifs
        protected $casts = [
            'email_verified_at' => 'datetime',
        ];

        // Les relations
        public function orders()
        {
            return $this->hasMany(Order::class);
        }
    }
