@extends('back.layout')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Seguimiento de Remesa: <span style="font-weight: bold;">{{ $remesa }}</span></h1>
                    </div>
                    {{-- <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v1</li>
                        </ol>
                    </div> --}}
                </div>
            </div>
        </div>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group mt-4">
                            <a href="{{ route('operations.courier.index') }}" class="btn btn-success" role="button"
                                aria-pressed="true">
                                <i class="fa fa-chevron-left"></i> Volver</a>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                @if ($estados == null)
                                    <h3 class="card-title">No hay estados reportados para esta remesa</h3>
                                @else
                                    <h3 class="card-title">Estados</h3>
                                @endif
                            </div>
                            <div class="card-body p-0">
                                @if ($estados == null)
                                    {{-- NO HACER NADA --}}
                                @else
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Código</th>
                                                <th>Descripción</th>
                                                <th>Fecha</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (isset($estados['codigo']))
                                                <tr>
                                                    <td>{{ $estados['codigo'] }}</td>
                                                    <td>{{ $estados['descripcion'] }}</td>
                                                    <td>{{ $estados['fecha'] }}</td>
                                                </tr>
                                            @else
                                                @foreach ($estados as $estado)
                                                    <tr>
                                                        <td>{{ $estado['codigo'] }}</td>
                                                        <td>{{ $estado['descripcion'] }}</td>
                                                        <td>{{ $estado['fecha'] }}</td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                @if ($novedades == null)
                                    <h3 class="card-title">No hay novedades reportadas para esta remesa</h3>
                                @else
                                    <h3 class="card-title">Novedades</h3>
                                @endif
                            </div>
                            <div class="card-body p-0">
                                @if ($novedades == null)
                                    {{-- NO HACER NADA --}}
                                @else
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Código</th>
                                                <th>Fecha</th>
                                                <th>Descripción</th>
                                                <th>Estado</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            

                                            @if (isset($novedades['codigonovedad']))
                                                <tr>
                                                    <td>{{ $novedades['codigonovedad'] }}</td>
                                                    <td>{{ $novedades['fechanovedad'] }}</td>
                                                    <td>{{ $novedades['novedad'] }}</td>
                                                    <td>{{ $novedades['estadonovedad'] }}</td>
                                                </tr>
                                            @else
                                                @foreach ($novedades as $novedad)
                                                    <tr>
                                                        <td>{{ $novedad['codigonovedad'] }}</td>
                                                        <td>{{ $novedad['fechanovedad'] }}</td>
                                                        <td>{{ $novedad['novedad'] }}</td>
                                                        <td>{{ $novedad['estadonovedad'] }}</td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
