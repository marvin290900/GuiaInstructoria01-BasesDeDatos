<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetallePrestamo extends Model
{
    use HasFactory;

    protected $table = 'Detalle_Prestamo';
    public $timestamps = false;
    protected $fillable = ['id_prestamo', 'id_libro'];
}
