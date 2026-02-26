@extends('layouts.diseno')

@section('contenido')
<div class="row justify-content-center">
    <div class="col-md-5">

        <div class="card border-success">
            <div class="card-header bg-success text-white">
                <h4>Modificar Comida</h4>
            </div>

            <div class="card-body">
                
                <form action="{{ route('comidas.update', $comida->id_comida) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label>Nombre de la Comida:</label>
                        <input type="text" name="nombre_comida" class="form-control" value="{{ $comida->nombre_comida }}">
                    </div>

                    <div class="mb-3">
                        <label>Costo Actual:</label>
                        <input type="text" name="costo" class="form-control" value="{{ $comida->costo }}">
                    </div>

                    <div class="mb-3">
                        <label>Tipo de Comida:</label>
                        <select name="id_tipo_comida" class="form-select">
                            @foreach($tipocomidas as $opcion)
                                @php

                                    $marcar = "";
                                    if($opcion->id_tipo_comida == $comida->id_tipo_comida){
                                        $marcar = "selected";
                                    }
                                @endphp
                                <option value="{{ $opcion->id_tipo_comida }}" {{ $marcar }}>
                                    {{ $opcion->nombre_categoria }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label>Descripción:</label>
                        <textarea name="detalle_comida" class="form-control">{{ $comida->detalle_comida }}</textarea>
                    </div>

                    <div style="margin-top: 25px;">
                        <button type="submit" class="btn btn-success">Actualizar los cambios</button>
                        <a href="{{ route('comidas.index') }}" class="btn btn-link">Regresar sin guardar</a>
                    </div>

                </form>
            </div>
        </div>

    </div>
</div>
@endsection