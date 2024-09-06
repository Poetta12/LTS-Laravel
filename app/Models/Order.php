<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function users(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(User::class);

    }

    public function pcart(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(PCart::class);
    }
}
