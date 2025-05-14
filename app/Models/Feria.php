<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feria extends Model
{
    protected $fillable = [
        'nombre',
        'fecha',
        'lugar',
        'descripcion',
    ];

    public function emprendedores()
    {
        return $this->belongsToMany(Emprendedor::class);
    }
}
