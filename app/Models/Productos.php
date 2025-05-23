<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'precio',
        'stock',
        'imagen_url',
        'categoria_id'
    ];

    public function categoria()
    {
        return $this->belongsTo(Categorias::class, 'categoria_id');
    }
}
