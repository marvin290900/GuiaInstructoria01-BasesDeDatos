<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    use HasFactory;

    protected $table = 'Libros';
    public $timestamps = false;

    protected $fillable = ['titulo', 'año_publicacion', 'id_categoria'];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'id_categoria');
    }

    public function autores()
    {
        return $this->belongsToMany(Autor::class, 'Libro_Autor', 'id_libro', 'id_autor');
    }

    public function prestamos()
    {
        return $this->belongsToMany(Prestamo::class, 'Detalle_Prestamo', 'id_libro', 'id_prestamo');
    }
}
