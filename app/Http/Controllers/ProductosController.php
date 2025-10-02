<?php
namespace App\Http\Controllers;

use App\Models\Productos;
use App\Models\Categoria;
use Illuminate\Http\Request;

class ProductosController extends Controller
{

   // Mostrar formulario
    public function metodo_mostrar_form()
{
    $categorias = Categoria::all(); // trae las categorías reales
    return view('productos.agregar_producto', compact('categorias'));
}


    // Guardar en la BD
    public function metodo_agregar_producto(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'descripcion' => 'nullable|string|max:250',
            'precio' => 'required|numeric|min:0',
            'fecha_lanzamiento' => 'nullable|date',
            'activo' => 'boolean',
            'id_categoria' => 'required|integer|min:1|max:5'
        ]);

        Productos::create($request->all());

        return redirect('/productos')->with('success', 'Producto agregado correctamente ✅');
    }
    
    //
    public function metodo_mostrar_lista()
    {
        $productos = Productos::all();
        return view('productos.lista_poroductos', compact('productos'));
    }

    public function metodo_ver_producto($id)
    {
        $producto = Productos::findOrFail($id); // busca el producto o lanza 404
        return view('productos.ver_producto', compact('producto'));
    }

        // Mostrar formulario para editar
    public function metodo_mostrar_editar($id)
    {
        $producto = Productos::findOrFail($id);
        return view('productos.editar_producto', compact('producto'));
    }

    // Actualizar el producto
    public function metodo_actualizar_producto(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'descripcion' => 'nullable|string|max:250',
            'precio' => 'required|numeric|min:0',
            'fecha_lanzamiento' => 'nullable|date',
            'activo' => 'boolean',
            'id_categoria' => 'required|integer|min:1|max:5',
        ]);

        $producto = Productos::findOrFail($id);
        $producto->update($request->all());

        return redirect('/productos')->with('success', 'Producto actualizado ✅');
    }

    // ELIMINAR producto
public function metodo_eliminar_producto($id)
{
    $producto = \App\Models\Productos::findOrFail($id);
    $producto->delete();

    return redirect('/productos')->with('success', 'Producto eliminado 🗑️');
}


}
