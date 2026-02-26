@extends('layouts.diseno')

@section('contenido')
<div class="row justify-content-center">
    <div class="col-md-6">

        <div class="card">
            <div class="card-header">
                <h4>Nueva Comida</h4>
            </div>
            
            <div class="card-body">


                <form action="{{ route('comidas.store') }}" method="POST">
                    @csrf
                    
                    <div class="mb-3">
                        <label class="form-label">Nombre de la comida:</label>
                        <input type="text" name="nombre_comida" class="form-control" placeholder="Ej. Enchiladas" value="{{ old('nombre_comida') }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Costo:</label>
                        <input type="number" step="00.00" name="costo" class="form-control" value="{{ old('costo') }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Tipo de Comida:</label>
                        <select name="id_tipo_comida" class="form-control">
                            <option value="">Selecciona un tipo de comida </option>
                            @foreach($tipocomidas as $t)
                                <option value="{{ $t->id_tipo_comida }}">{{ $t->nombre_categoria }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Descripcion:</label>
                        <textarea name="detalle_comida" class="form-control" rows="2">{{ old('detalle_comida') }}</textarea>
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary">Guardar Nueva Comida</button>
                        <a href="{{ route('comidas.index') }}" class="btn btn-light border">Regresar</a>
                    </div>

                </form>

            </div>
        </div>

    </div>
</div>
@endsection