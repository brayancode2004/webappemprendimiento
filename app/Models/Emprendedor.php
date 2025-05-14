<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Emprendedor extends Model
{
    protected $fillable = [
        'nombre',
        'telefono',
        'rubro',
    ];

    public function ferias()
    {
        return $this->belongsToMany(Feria::class);
    }
}
