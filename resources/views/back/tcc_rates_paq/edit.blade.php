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
                        <form method="POST" action="{{ route('tcc-rates-paq.update', $rate) }}" enctype="multipart/form-data">
                            @csrf {{ method_field('PUT') }}
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
                                                            <option value="{{ $departamento->id_departamento }}" 
                                                                {{ $rate->departamento_origen == $departamento->departamento ? 'selected' : ''}}>{{ $departamento->departamento }}
                                                            </option>
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
                                                            @foreach ($municipios as $municipio)
                                                            <option value="{{ $municipio->id_municipio }}" 
                                                                {{ $rate->municipio_origen == $municipio->municipio ? 'selected' : ''}}>{{ $municipio->municipio }}
                                                            </option>
                                                            @endforeach
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
                                                            @foreach ($departamentos as $departamento)
                                                            <option value="{{ $departamento->id_departamento }}" 
                                                                {{ $rate->departamento_destino == $departamento->departamento ? 'selected' : ''}}>{{ $departamento->departamento }}
                                                            </option>
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
                                                            @foreach ($municipios as $municipio)
                                                            <option value="{{ $municipio->id_municipio }}" 
                                                                {{ $rate->municipio_destino == $municipio->municipio ? 'selected' : ''}}>{{ $municipio->municipio }}
                                                            </option>
                                                            @endforeach
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
                                                            <option value="66" {{ $rate->centro_operaciones == 'Armenia' ? 'selected' : ''}}>Armenia</option>
                                                            <option value="88" {{ $rate->centro_operaciones == 'Barranquilla' ? 'selected' : ''}}>Barranquilla</option>
                                                            <option value="107" {{ $rate->centro_operaciones == 'Bogotá D.C.' ? 'selected' : ''}}>Bogotá D.C.</option>
                                                            <option value="118" {{ $rate->centro_operaciones == 'Bucaramanga' ? 'selected' : ''}}>Bucaramanga</option>
                                                            <option value="120" {{ $rate->centro_operaciones == 'Buenaventura' ? 'selected' : ''}}>Buenaventura</option>
                                                            <option value="150" {{ $rate->centro_operaciones == 'Cali' ? 'selected' : ''}}>Cali</option>
                                                            <option value="177" {{ $rate->centro_operaciones == 'Caucasia' ? 'selected' : ''}}>Caucasia</option>
                                                            <option value="275" {{ $rate->centro_operaciones == 'Cúcuta' ? 'selected' : ''}}>Cúcuta</option>
                                                            <option value="428" {{ $rate->centro_operaciones == 'Ibagué' ? 'selected' : ''}}>Ibagué</option>
                                                            <option value="434" {{ $rate->centro_operaciones == 'Ipiales' ? 'selected' : ''}}>Ipiales</option>
                                                            <option value="532" {{ $rate->centro_operaciones == 'Manizales' ? 'selected' : ''}}>Manizales</option>
                                                            <option value="547" {{ $rate->centro_operaciones == 'Medellín' ? 'selected' : ''}}>Medellín</option>
                                                            <option value="573" {{ $rate->centro_operaciones == 'Montería' ? 'selected' : ''}}>Montería</option>
                                                            <option value="596" {{ $rate->centro_operaciones == 'Neiva' ? 'selected' : ''}}>Neiva</option>
                                                            <option value="829" {{ $rate->centro_operaciones == 'Pasto' ? 'selected' : ''}}>Pasto</option>
                                                            <option value="657" {{ $rate->centro_operaciones == 'Pereira' ? 'selected' : ''}}>Pereira</option>
                                                            <option value="877" {{ $rate->centro_operaciones == 'Santa Marta' ? 'selected' : ''}}>Santa Marta</option>
                                                            <option value="914" {{ $rate->centro_operaciones == 'Sincelejo' ? 'selected' : ''}}>Sincelejo</option>
                                                            <option value="1013" {{ $rate->centro_operaciones == 'Tunja' ? 'selected' : ''}}>Tunja</option>
                                                            <option value="1042" {{ $rate->centro_operaciones == 'Valledupar' ? 'selected' : ''}}>Valledupar</option>
                                                            <option value="1070" {{ $rate->centro_operaciones == 'Villavicencio' ? 'selected' : ''}}>Villavicencio</option>
                                                            <option value="1085" {{ $rate->centro_operaciones == 'Yopal' ? 'selected' : ''}}>Yopal</option>
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
                                                            value="{{ old('precio', $rate->valor) }}">
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
                                                    <input type="checkbox" id="aliados" name="aliados" value="{{ $rate->aliados }}" {{ $rate->aliados == 1 ? 'checked' : '' }}>
                                                    <label for="aliados">
                                                        Aliados
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group clearfix">
                                                <div class="icheck-success d-inline">
                                                    <input type="checkbox" id="recogida" name="recogida" value="{{ $rate->recogida }}" {{ $rate->recogida == 1 ? 'checked' : '' }}>
                                                    <label for="recogida">
                                                        Recogida
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group clearfix">
                                                <div class="icheck-success d-inline">
                                                    <input type="checkbox" id="boomerang" name="boomerang" value="{{ $rate->boomerang }}" {{ $rate->boomerang == 1 ? 'checked' : '' }}>
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
                                        <button type="submit" class="btn btn-primary">Actualizar Registro</button>
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
