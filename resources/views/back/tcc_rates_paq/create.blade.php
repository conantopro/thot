@extends('back.layout')

@section('content')
    <div class="content-wrapper">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group mt-4">
                            {{-- <a href="{{ route('dashboard') }}" class="btn btn-primary" role="button" aria-pressed="true">
                                <i class="fa fa-tachometer-alt"></i> Panel de Control</a> --}}
                            <a href="{{ route('tcc-rates-paq.index') }}" class="btn btn-success" role="button" aria-pressed="true">
                                <i class="fa fa-chevron-left"></i> Volver</a>
                            <a href="#" class="btn btn-warning" role="button" aria-pressed="true">
                                <i class="fa fa-table"></i> Carga Masiva</a>
                        </div>
                        <form method="POST" action="{{ route('tcc-rates-paq.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <h5 class="m-0">Agregar Registro</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="box box-primary">
                                                <div class="box-body">
                                                    <div class="form-group">
                                                        <label>Departamento Origen</label>
                                                        <select class="form-control select2bs4" id="departamento_origen" name="departamento_origen" style="width: 100%;">
                                                            <option selected="selected" disabled>-- Seleccionar Departamento --</option>
                                                            @foreach ($departamentos as $departamento)
                                                                <option value="{{ $departamento->id_departamento }}">{{ $departamento->departamento }}</option>
                                                            @endforeach
                                                        </select>
                                                        @if($errors->has('departamento_origen'))
                                                            <span class="error text-danger" for="input-departamento_origen">{{ $errors->first('departamento_origen') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="box box-primary">
                                                <div class="box-body">
                                                    <div class="form-group">
                                                        <label>Municipio Origen</label>
                                                        <select class="form-control select2bs4" id="municipio_origen" name="municipio_origen" style="width: 100%;">
                                                            <option selected="selected" disabled>-- Seleccionar Municipio --</option>
                                                        </select>
                                                        @if($errors->has('municipio_origen'))
                                                            <span class="error text-danger" for="input-municipio_origen">{{ $errors->first('municipio_origen') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="box box-primary">
                                                <div class="box-body">
                                                    <div class="form-group">
                                                        <label>Departamento Destino</label>
                                                        <select class="form-control select2bs4" id="departamento_destino" name="departamento_destino" style="width: 100%;">
                                                            <option selected="selected" disabled>-- Seleccionar Departamento --</option>
                                                            @foreach ($departamentos as $departamento)
                                                                <option value="{{ $departamento->id_departamento }}">{{ $departamento->departamento }}</option>
                                                            @endforeach
                                                        </select>
                                                        @if($errors->has('departamento_destino'))
                                                            <span class="error text-danger" for="input-departamento_destino">{{ $errors->first('departamento_destino') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="box box-primary">
                                                <div class="box-body">
                                                    <div class="form-group">
                                                        <label>Municipio Destino</label>
                                                        <select class="form-control select2bs4" id="municipio_destino" name="municipio_destino" style="width: 100%;">
                                                            <option selected="selected" disabled>-- Seleccionar Municipio --</option>
                                                        </select>
                                                        @if($errors->has('municipio_destino'))
                                                            <span class="error text-danger" for="input-municipio_destino">{{ $errors->first('municipio_destino') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="box box-primary">
                                                <div class="box-body">
                                                    <div class="form-group">
                                                        <label>Centro de Operaciones</label>
                                                        <select class="form-control select2bs4" name="centro_operaciones" style="width: 100%;">
                                                            <option selected="selected" disabled>-- Seleccionar C.O. --</option>
                                                            <option value="66">Armenia</option>
                                                            <option value="88">Barranquilla</option>
                                                            <option value="107">Bogotá D.C.</option>
                                                            <option value="118">Bucaramanga</option>
                                                            <option value="120">Buenaventura</option>
                                                            <option value="150">Cali</option>
                                                            <option value="177">Caucasia</option>
                                                            <option value="275">Cúcuta</option>
                                                            <option value="428">Ibagué</option>
                                                            <option value="434">Ipiales</option>
                                                            <option value="532">Manizales</option>
                                                            <option value="547">Medellín</option>
                                                            <option value="573">Montería</option>
                                                            <option value="596">Neiva</option>
                                                            <option value="829">Pasto</option>
                                                            <option value="657">Pereira</option>
                                                            <option value="877">Santa Marta</option>
                                                            <option value="914">Sincelejo</option>
                                                            <option value="1013">Tunja</option>
                                                            <option value="1042">Valledupar</option>
                                                            <option value="1070">Villavicencio</option>
                                                            <option value="1085">Yopal</option>
                                                        </select>
                                                        @if($errors->has('centro_operaciones'))
                                                            <span class="error text-danger" for="input-centro_operaciones">{{ $errors->first('centro_operaciones') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="box box-primary">
                                                <div class="box-body">
                                                    <div class="form-group">
                                                        <label for="precio">Precio</label>
                                                        <input type="text" id="precio" name="precio"
                                                            placeholder="Precio" class="form-control textbox"
                                                            value="{{ old('precio') }}">
                                                        @if ($errors->has('precio'))
                                                            <span class="error text-danger"
                                                                for="input-precio">{{ $errors->first('precio') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group clearfix">
                                                <div class="icheck-success d-inline">
                                                    <input type="checkbox" id="aliados" name="aliados" value="1" checked>
                                                    <label for="aliados">
                                                        Aliados
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group clearfix">
                                                <div class="icheck-success d-inline">
                                                    <input type="checkbox" id="recogida" name="recogida" value="1" checked>
                                                    <label for="recogida">
                                                        Recogida
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group clearfix">
                                                <div class="icheck-success d-inline">
                                                    <input type="checkbox" id="boomerang" name="boomerang" value="1" checked>
                                                    <label for="boomerang">
                                                        Boomerang
                                                    </label>
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
