@extends('back.layout')

@section('content')
    <div class="content-wrapper">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group mt-4">
                            <a href="{{ route('dashboard') }}" class="btn btn-primary" role="button" aria-pressed="true">
                                <i class="fa fa-tachometer-alt"></i> Panel de Control</a>
                            <a href="{{ route('tcc-rates-paq.create') }}" class="btn btn-success" role="button" aria-pressed="true">
                                <i class="fa fa-plus"></i> Agregar Nuevo Registro</a>
                            <a href="#" class="btn btn-warning" role="button" aria-pressed="true">
                                <i class="fa fa-table"></i> Carga Masiva</a>
                        </div>
                        <div class="card">
                            <div class="card-header">
                            <h3 class="card-title">Tarifario TCC 2021 - 2022</h3>
                            </div>
                            <div class="card-body">
                                @if(session('success'))
                                    <div class="alert alert-success alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        {{-- <h5><i class="icon fas fa-check"></i> Alert!</h5> --}}
                                        {{ session('success') }}
                                    </div>
                                @endif
                                <table id="example1" class="table table-bordered table-striped" data-page-length='5'>
                                    <thead>
                                        <tr>
                                            <th>Origen</th>
                                            <th>Destino</th>
                                            <th>Aliados</th>
                                            <th>Recogida</th>
                                            <th>Boomerang</th>
                                            <th>Centro de Operaciones</th>
                                            <th>Valor</th>
                                            <th class="text-right">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($rates_paq as $rate)
                                            <tr>
                                                <td>{{ $rate->municipio_origen }} ({{ $rate->departamento_origen }})</td>
                                                <td>{{ $rate->municipio_destino }} ({{ $rate->departamento_destino }})</td>

                                                @if ($rate->aliados == 0)
                                                    <td>NO</td>
                                                @else
                                                    <td>SI</td>
                                                @endif

                                                @if ($rate->recogida == 0)
                                                    <td>NO</td>
                                                @else
                                                    <td>SI</td>
                                                @endif

                                                @if ($rate->boomerang == 0)
                                                    <td>NO</td>
                                                @else
                                                    <td>SI</td>
                                                @endif

                                                <td>{{ $rate->centro_operaciones }}</td>
                                                <td>{{ $rate->valor }}</td>
                                                <td class="text-right">
                                                    <a href="#" target="_blank" class="btn btn-xs btn-warning"><i class="fa fa-sign-in-alt"></i></a>
                                                    {{-- <a href="{{ route('companies.show', $rate->id) }}" class="btn btn-xs btn-success"><i class="fa fa-eye"></i></a> --}}
                                                    <a href="#" class="btn btn-xs btn-success"><i class="fa fa-eye"></i></a>
                                                    {{-- <a href="{{ route('companies.edit', $rate->id) }}" class="btn btn-xs btn-info"><i class="fa fa-pencil-alt"></i></a> --}}
                                                    <a href="{{ route('tcc-rates-paq.edit', $rate) }}" class="btn btn-xs btn-info"><i class="fa fa-pencil-alt"></i></a>
                                                    <button type="submit" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#delete-rate-paq" data-id="{{ $rate->id }}" data-name="{{ $rate->municipio_origen }} ({{ $rate->departamento_origen }}) - {{ $rate->municipio_destino }} ({{ $rate->departamento_destino }})">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>Origen</th>
                                        <th>Destino</th>
                                        <th>Aliados</th>
                                        <th>Recogida</th>
                                        <th>Boomerang</th>
                                        <th>Centro de Operaciones</th>
                                        <th>Valor</th>
                                        <th class="text-right">Acciones</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="delete-rate-paq">
        <div class="modal-dialog">
            <div class="modal-content bg-primary">
                <div class="modal-header">
                    <h4 class="modal-title">Solicitud de confirmación</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="ruta"></p>
                    <p>¿Seguro que deseas eliminar este registro?</p>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cancelar</button>
                    <form method="POST" action="{{ route('tcc-rates-paq.destroy', 1) }}" data-action="{{ route('tcc-rates-paq.destroy', 1) }}" style="display: inline-block;" class="form-delete">
                    @csrf
                    @method('DELETE')
                        <button type="submit" class="btn btn-outline-light">Sí, eliminar!</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
