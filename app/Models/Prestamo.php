<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
    use HasFactory;

    protected $table = 'Prestamos';
    public $timestamps = false;

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
        return $this->belongsToMany(Libro::class, 'Detalle_Prestamo', 'id_prestamo', 'id_libro');
    }
}
