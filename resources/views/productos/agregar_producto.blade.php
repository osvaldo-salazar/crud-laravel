@extends('productos.productos_template')

@section('title', 'Agregar Producto')

@section('main')
<div class="container mt-4">
    <h2 class="mb-4">Agregar Producto</h2>

    {{-- Alertas de error --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Ups!</strong> Hay problemas con los datos ingresados:<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                   <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Mensaje de éxito --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="/agregar_producto" method="POST" class="card p-4 shadow-sm">
        @csrf

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre del producto</label>
            <input type="text" name="nombre" id="nombre" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea name="descripcion" id="descripcion" class="form-control" rows="3"></textarea>
        </div>

        <div class="mb-3">
            <label for="precio" class="form-label">Precio</label>
            <input type="number" name="precio" id="precio" class="form-control" step="0.01" required>
        </div>

        <div class="mb-3">
            <label for="fecha_lanzamiento" class="form-label">Fecha de lanzamiento</label>
            <input type="date" name="fecha_lanzamiento" id="fecha_lanzamiento" class="form-control">
        </div>

        {{-- Categoría con números fijos --}}
        <div class="mb-3">
            <label for="id_categoria" class="form-label">Categoría</label>
            <select name="id_categoria" id="id_categoria" class="form-select" required>
                <option value="">-- Selecciona --</option>
                <option value="1">1 - Electrónica</option>
                <option value="2">2 - Ropa</option>
                <option value="3">3 - Comida</option>
                <option value="4">4 - Juguetes</option>
                <option value="5">5 - Libros</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="activo" class="form-label">Activo</label>
            <select name="activo" id="activo" class="form-select">
                <option value="1">Sí</option>
                <option value="0">No</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">
            <i class="bi bi-save"></i> Guardar Producto
        </button>

        <br>
         <a href="/productos" class="btn btn-secondary">
                <i class="bi bi-arrow-left-circle"></i> Volver a la lista
            </a>
    </form>
</div>
@endsection
