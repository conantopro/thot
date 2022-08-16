@extends('back.layout')

@section('content')
    <div class="content-wrapper">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group mt-4">
                            <a href="{{ route('home') }}" class="btn btn-primary" role="button" aria-pressed="true">
                                <i class="fa fa-tachometer-alt"></i> Panel de Control</a>
                            <a href="{{ route('operations.courier.create') }}" class="btn btn-success" role="button" aria-pressed="true">
                                <i class="fa fa-plus"></i> Agregar Nuevo Registro</a>
                            <a href="#" class="btn btn-warning" role="button" aria-pressed="true">
                                <i class="fa fa-table"></i> Carga Masiva</a>
                        </div>
                        <div class="card">
                            <div class="card-header">
                            <h2 class="card-title">Operaciones: <span style="font-weight: bold;">COURIER</span></h2>
                            </div>
                            <div class="card-body">
                                @if(session('success'))
                                    <div class="alert alert-success alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        {{ session('success') }}
                                    </div>
                                @endif

                                <table id="example1" class="table table-bordered table-striped" data-page-length='5'>
                                    <thead>
                                        <tr>
                                            <th>Remesa</th>
                                            <th>Fecha/Hora</th>
                                            <th>Remitente</th>
                                            <th>Destinatario</th>
                                            <th>Valor Servicio</th>
                                            <th>Estado</th>
                                            <th class="text-right">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($despachos as $despacho)
                                            <tr>
                                                <td style="vertical-align:middle;">
                                                    <div style="font-weight: bold; text-align: center;">Mensajería</div>
                                                    <div><a href="#" class="btn btn-lg btn-block btn-outline-primary">{{ $despacho->remesa }}</a></div>
                                                </td>
                                                <td style="vertical-align:middle;">
                                                    <div style="font-weight: bold;">DD/MM/AAAA</div>
                                                </td>
                                                <td style="vertical-align:middle;">
                                                    <div style="font-weight: bold;">MUNICIPIO (DEPARTAMENTO)</div>
                                                    <div>NOMBRE COMPLETO DE EMPRESA</div>
                                                </td>
                                                <td style="vertical-align:middle;">
                                                    <div style="font-weight: bold;">MUNICIPIO (DEPARTAMENTO)</div>
                                                    <div>NOMBRE COMPLETO DESTINATARIO</div>
                                                    <div>INFORMACIÓN ADICIONAL</div>
                                                </td>
                                                <td style="vertical-align:middle;">
                                                    <div style="font-weight: bold; font-size: 2rem; text-align: center;"><a href="#" class="btn btn-lg btn-block btn-outline-primary">$11.250</a></div>
                                                </td>
                                                <td style="vertical-align:middle;">
                                                    <div style="margin-bottom: 2px; width: 100%"><a href="{{ route('operations.courier.show', $despacho->id) }}" class="btn btn-sm btn-success btn-block"><i class="fa fa-eye"></i> Ver Detalle</a></div>
                                                    <div>
                                                        <a href="#" class="btn btn-sm btn-dark btn-block"><i class="fa fa-check"></i> Comprobante</a>
                                                    </div>
                                                </td>
                                                <td class="text-right" style="vertical-align:middle;">
                                                    <a href="#" target="_blank" class="btn btn-xs btn-dark"><i class="fa fa-upload"></i></a>
                                                    <a href="#" target="_blank" class="btn btn-xs btn-warning"><i class="fa fa-tags"></i></a>
                                                    <a href="#" class="btn btn-xs btn-info"><i class="fa fa-file"></i></a>
                                                    <button type="submit" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#delete-rate-paq" data-id="#">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>Remesa</th>
                                        <th>Fecha/Hora</th>
                                        <th>Remitente</th>
                                        <th>Destinatario</th>
                                        <th>Valor Servicio</th>
                                        <th>Estado</th>
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
