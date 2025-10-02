<?php   
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categorias';
    protected $primaryKey = 'idCategoria';
    public $timestamps = false; // porque tu tabla no tiene timestamps

    protected $fillable = ['categoria', 'activo'];

    public function productos()
    {
        return $this->hasMany(Producto::class, 'id_categoria', 'idCategoria');
    }
}
