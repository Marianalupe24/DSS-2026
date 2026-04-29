@extends('layouts.Plantilla')

@section('titulo','Crear Venta')

@section('contenido')
<div class="container mt-5">

    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Nueva Venta</h4>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('venta.store') }}">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Producto</label>
                    <input type="text" name="producto" class="form-control" placeholder="Ingrese el producto" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Cantidad</label>
                    <input type="number" name="cantidad" class="form-control" placeholder="Ej: 2" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Precio</label>
                    <input type="number" step="0.01" name="precio" class="form-control" placeholder="Ej: 10.50" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Total</label>
                    <input type="number" step="0.01" name="total" class="form-control">
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('venta.index') }}" class="btn btn-secondary">
                       Volver
                    </a>

                    <button type="submit" class="btn btn-success">
                        Guardar
                    </button>
                </div>

            </form>
        </div>
    </div>

</div>

@endsection