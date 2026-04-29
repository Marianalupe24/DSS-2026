@extends('layouts.Plantilla')

@section('titulo','Inicio')

@section('contenido')
<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Lista de Ventas</h2>
        <a href="{{route('venta.create')}}" class="btn btn-primary">+ Nueva Venta</a>
    </div>

    <div class="card shadow">
        <div class="card-body">

            <table class="table table-hover table-bordered align-middle">
                <thead class="table-dark text-center">
                    <tr>
                        <th>ID</th>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Precio</th>
                        <th>Total</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody>
                @foreach($listaVentas as $venta)
                    <tr class="text-center">
                        <td>{{$venta->id}}</td>
                        <td>{{$venta->producto}}</td>
                        <td>{{$venta->cantidad}}</td>
                        <td>${{$venta->precio}}</td>
                        <td class="fw-bold text-success">${{$venta->total}}</td>
                        <td>
                            <a href="{{ route('venta.edit', $venta->id) }}" class="btn btn-warning btn-sm">
                                Editar
                            </a>

                            <form id="form-eliminar-{{$venta->id}}"
                                action="{{ route('venta.destroy', $venta->id) }}"
                                method="POST"
                                class="d-inline">
                              @csrf
                              @method('DELETE')
                              <button type="button"
                                    class="btn btn-danger btn-sm btn-eliminar"
                                    data-id="{{$venta->id}}">
                                    Eliminar
                            </button>
                          </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>
            

        </div>
    </div>

</div>
<!-- Modal -->
<div class="modal fade" id="modalEliminar" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
  
        <div class="modal-header bg-danger text-white">
          <h5 class="modal-title">Confirmar eliminación</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
  
        <div class="modal-body">
          ¿Estás seguro que deseas eliminar esta venta?
        </div>
  
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
              Cancelar
          </button>
  
          <button type="button" id="btn-confirmar-eliminar" class="btn btn-danger">
              Sí, eliminar
          </button>
        </div>
  
      </div>
    </div>
  </div>
  <script>
    document.addEventListener("DOMContentLoaded", function () {
    
        let ventaId = null;
        const modal = new bootstrap.Modal(document.getElementById('modalEliminar'));
    
        document.querySelectorAll('.btn-eliminar').forEach(btn => {
            btn.addEventListener('click', function () {
                ventaId = this.getAttribute('data-id');
                modal.show();
            });
        });
    
        document.getElementById('btn-confirmar-eliminar').addEventListener('click', function () {
            if (ventaId) {
                document.getElementById('form-eliminar-' + ventaId).submit();
            }
        });
    
    });
    </script>

@endsection