@extends('productos.productos_template')

@section('title', 'Editar Producto')

@section('main')
<div class="container mt-4">
    <h2 class="mb-4">Editar Producto</h2>

    <form action="/editar_producto/{{ $producto->idProducto }}" method="POST" class="card p-4 shadow-sm">
        @csrf

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $producto->nombre }}" required>
        </div>

        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea name="descripcion" id="descripcion" class="form-control">{{ $producto->descripcion }}</textarea>
        </div>

        <div class="mb-3">
            <label for="precio" class="form-label">Precio</label>
            <input type="number" name="precio" id="precio" class="form-control" step="0.01" value="{{ $producto->precio }}" required>
        </div>

        <div class="mb-3">
            <label for="fecha_lanzamiento" class="form-label">Fecha lanzamiento</label>
            <input type="date" name="fecha_lanzamiento" id="fecha_lanzamiento" class="form-control" value="{{ $producto->fecha_lanzamiento }}">
        </div>

        <div class="mb-3">
            <label for="id_categoria" class="form-label">Categoría</label>
            <select name="id_categoria" id="id_categoria" class="form-select" required>
                <option value="1" {{ $producto->id_categoria == 1 ? 'selected' : '' }}>1 - Electrónica</option>
                <option value="2" {{ $producto->id_categoria == 2 ? 'selected' : '' }}>2 - Ropa</option>
                <option value="3" {{ $producto->id_categoria == 3 ? 'selected' : '' }}>3 - Comida</option>
                <option value="4" {{ $producto->id_categoria == 4 ? 'selected' : '' }}>4 - Juguetes</option>
                <option value="5" {{ $producto->id_categoria == 5 ? 'selected' : '' }}>5 - Libros</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="activo" class="form-label">Activo</label>
            <select name="activo" id="activo" class="form-select">
                <option value="1" {{ $producto->activo ? 'selected' : '' }}>Sí</option>
                <option value="0" {{ !$producto->activo ? 'selected' : '' }}>No</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">
            <i class="bi bi-save"></i> Guardar cambios
        </button>
        <a href="/productos" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
