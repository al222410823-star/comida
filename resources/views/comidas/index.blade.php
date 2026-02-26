@extends('layouts.diseno')

@section('contenido')
<div class="row">
    <div class="col-md-12">
        
        <div class="card">
            <div class="card-header">
                <h3 style="display: inline-block;">Menú</h3>
                <a href="{{ route('comidas.create') }}" class="btn btn-warning float-end">Agregar Nueva Comida</a>
            </div>

            <div class="card-body">

                <table class="table table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Costo</th>
                            <th>Tipo</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($comidas as $comida)
                        @php

                            $id_actual = $comida->id_comida;
                        @endphp
                        <tr>
                            <td>{{ $id_actual }}</td>
                            <td>{{ $comida->nombre_comida }}</td>
                            <td>$ {{ $comida->costo }}</td>
                            <td>

                                @if($comida->tipoComida)
                                    {{ $comida->tipoComida->nombre_categoria }}
                                @else
                                    Sin categoria
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('comidas.edit', $comida->id_comida) }}" class="btn btn-info btn-sm">Editar</a>

                                <form action="{{ route('comidas.destroy', $comida->id_comida) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estas seguro de borrar esto?')">
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
</div>
@endsection