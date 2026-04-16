<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    use HasFactory;

    protected $table = 'autores';
    protected $fillable = ['nombre'];

    public function libros()
    {
        return $this->belongsToMany(Libro::class, 'libro_autor', 'id_autor', 'id_libro');
    }
}
