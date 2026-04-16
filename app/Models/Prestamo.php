<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
    use HasFactory;

    protected $table = 'prestamos';
    protected $primaryKey = 'id_prestamos';

    protected $fillable = [
        'id_usuario',
        'fecha_prestamo',
        'fecha_devolucion'
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }

    public function libros()
    {
        return $this->belongsToMany(Libro::class, 'detalle_prestamos', 'id_prestamos', 'id_libro');
    }
}
