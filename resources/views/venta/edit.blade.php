@extends('layouts.Plantilla')

@section('titulo','Editar Venta')

@section('contenido')
<div class="container mt-5">

    <div class="card shadow-lg">
        <div class="card-header bg-warning text-dark">
            <h4 class="mb-0">Editar Venta</h4>
        </div>

        <div class="card-body">
            <form action="{{ route('venta.update', $venta->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Producto</label>
                    <input type="text" name="producto" class="form-control" value="{{ $venta->producto }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Cantidad</label>
                    <input type="number" name="cantidad" class="form-control" value="{{ $venta->cantidad }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Precio</label>
                    <input type="number" step="0.01" name="precio" class="form-control" value="{{ $venta->precio }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Total</label>
                    <input type="number" step="0.01" name="total" class="form-control" value="{{ $venta->total }}" readonly>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('venta.index') }}" class="btn btn-secondary">
                       Volver
                    </a>

                    <button type="submit" class="btn btn-success">
                         Actualizar
                    </button>
                </div>

            </form>
        </div>
    </div>

</div>
@endsection