@extends('productos.productos_template')

@section('title', 'Detalle de producto')

@section('main')
  <h1 class="mb-4">Detalle del producto</h1>

  <ul class="list-group">
        <li class="list-group-item"><strong>Id Producto:</strong> {{ $producto->idProducto}}</li>
        <li class="list-group-item"><strong>Nombre:</strong> {{ $producto->nombre }}</li>
        <li class="list-group-item"><strong>Descripción:</strong> {{ $producto->descripcion ?? '—' }}</li>
        <li class="list-group-item"><strong>Precio:</strong> ₡{{ number_format($producto->precio, 2) }}</li>
        <li class="list-group-item"><strong>Fecha lanzamiento:</strong> {{ $producto->fecha_lanzamiento ?? '—' }}</li>
        <li class="list-group-item">
        <strong>Activo:</strong>
        <span class="badge text-bg-{{ $producto->activo ? 'success' : 'secondary' }}">
            {{ $producto->activo ? 'Activo' : 'Inactivo' }}
        </span>
        </li>
        <li class="list-group-item"><strong>Categoría:</strong> {{ $producto->id_categoria }}</li>
        <li class="list-group-item"><strong>Creado:</strong> {{ $producto->created_at?->format('Y-m-d H:i') }}</li>
        <li class="list-group-item"><strong>Actualizado:</strong> {{ $producto->updated_at?->format('Y-m-d H:i') }}</li>
  </ul>
@endsection
