@extends('productos.productos_template')

@section('title', 'Lista de productos')

@section('main')
  <h1 class="mb-4 d-flex justify-content-between align-items-center">
      Productos
      <a href="/agregar_producto" class="btn btn-success">
          <i class="bi bi-plus-circle"></i> Agregar producto
      </a>
  </h1>

  @if($productos->isEmpty())
    <div class="alert alert-warning">No hay productos registrados.</div>
  @else
    @php
        // Mapa de categorías fijas (id => nombre)
        $categorias = [
            1 => 'Electrónica',
            2 => 'Ropa',
            3 => 'Comida',
            4 => 'Juguetes',
            5 => 'Libros'
        ];
    @endphp

    <div class="table-responsive">
        <table class="table table-striped table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>Id Producto</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Fecha lanzamiento</th>
                    <th>Activo</th>
                    <th>Categoría</th>
                    <th>Creado</th>
                    <th>Actualizado</th>
                    <th class="text-nowrap">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($productos as $p)
                    <tr>
                        <td>{{ $p->idProducto }}</td>
                        <td>{{ $p->nombre }}</td>
                        <td>{{ $p->descripcion ?? '—' }}</td>
                        <td>₡{{ number_format($p->precio, 2) }}</td>
                        <td>{{ $p->fecha_lanzamiento ?? '—' }}</td>
                        <td>
                            <span class="badge text-bg-{{ $p->activo ? 'success' : 'secondary' }}">
                            {{ $p->activo ? 'Activo' : 'Inactivo' }}
                            </span>
                        </td>
                        <td>
                            {{ $p->id_categoria }} - {{ $categorias[$p->id_categoria] ?? 'Desconocida' }}
                        </td>
                        <td>{{ $p->created_at?->format('Y-m-d H:i') }}</td>
                        <td>{{ $p->updated_at?->format('Y-m-d H:i') }}</td>
                       <td class="text-nowrap">
                          {{-- Botón editar --}}
                          <a href="/editar_producto/{{ $p->idProducto }}" class="btn btn-sm btn-outline-primary" title="Editar">
                              <i class="bi bi-pencil-square"></i>
                          </a>

                          {{-- Botón eliminar --}}
                          <form action="/eliminar_producto/{{ $p->idProducto }}" method="POST" class="d-inline form-delete">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-sm btn-outline-danger" title="Eliminar">
                                  <i class="bi bi-trash"></i>
                              </button>
                          </form>

                      </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
  @endif
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
  document.querySelectorAll('.form-delete').forEach(function(form) {
    form.addEventListener('submit', function(e) {
      if (!confirm('¿Eliminar este producto?')) e.preventDefault();
    });
  });
});
</script>
@endsection
