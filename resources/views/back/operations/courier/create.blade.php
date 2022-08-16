@extends('back.layout')

@section('content')
    <div class="content-wrapper">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mt-4">
                            {{-- <a href="{{ route('dashboard') }}" class="btn btn-primary" role="button" aria-pressed="true">
                                <i class="fa fa-tachometer-alt"></i> Panel de Control</a> --}}
                            <a href="{{ route('operations.courier.index') }}" class="btn btn-success" role="button" aria-pressed="true">
                                <i class="fa fa-chevron-left"></i> Volver</a>
                            <a href="#" class="btn btn-warning" role="button" aria-pressed="true">
                                <i class="fa fa-table"></i> Carga Masiva</a>
                        </div>
                        <form method="POST" action="{{ route('operations.courier.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <h5 class="m-0">Agregar Despacho</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="box box-primary">
                                                <div class="box-body">
                                                    <div class="form-group">
                                                        <label for="remesa">Remesa</label>
                                                        <input type="text" id="remesa" name="remesa"
                                                            placeholder="Remesa" class="form-control textbox"
                                                            value="{{ old('remesa') }}">
                                                        @if ($errors->has('remesa'))
                                                            <span class="error text-danger"
                                                                for="input-remesa">{{ $errors->first('remesa') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="box box-primary">
                                                <div class="box-body">
                                                    <div class="form-group">
                                                        <label>Unidad de Negocio</label>
                                                        <select class="form-control select2bs4" name="unidad_negocio" style="width: 100%;">
                                                            <option selected="selected" disabled>-- Seleccionar Unidad de Negocio --</option>
                                                            <option value="Mensajería">Mensajería</option>
                                                            <option value="Paquetería">Paquetería</option>
                                                        </select>
                                                        @if($errors->has('unidad_negocio'))
                                                            <span class="error text-danger" for="input-unidad_negocio">{{ $errors->first('unidad_negocio') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    
                                </div>
                                <div class="card-footer ml-auto mr-auto bg-transparent">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Guardar Registro</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
