<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ressource extends Model
{
    protected $fillable = ['name', 'logo', 'lien', 'description'];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];


}
