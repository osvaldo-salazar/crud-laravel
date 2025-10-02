<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\Http\Controllers\ProductosController;
class Productos extends Model
{
    /** @use HasFactory<\Database\Factories\ProductosFactory> */
    use HasFactory;

    protected $primaryKey = 'idProducto';
        protected $table = 'productos';

/** */
    /** @var list<string>
     */

    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'fecha_lanzamiento',
        'activo',
        'id_categoria',
    ];

     public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'id_categoria', 'idCategoria');
    }

}
