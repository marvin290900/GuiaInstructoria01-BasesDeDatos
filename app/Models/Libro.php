<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    use HasFactory;

    protected $table = 'libros';

    protected $fillable = ['titulo', 'anio_publicacion', 'id_categoria'];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'id_categoria');
    }

    public function autores()
    {
        return $this->belongsToMany(Autor::class, 'libro_autor', 'id_libro', 'id_autor');
    }

    public function prestamos()
    {
        return $this->belongsToMany(
            Prestamo::class,
            'detalle_prestamos',
            'id_libro',
            'id_prestamos'
        );
    }
}
