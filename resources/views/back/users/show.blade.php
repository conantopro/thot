@extends('back.layout')

@section('content')
    <div class="content-wrapper">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group mt-4">
                            <a href="/home" class="btn btn-primary" role="button" aria-pressed="true"><i class="fa fa-chevron-left"></i> Dashboard</a>
                        </div>
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                {{-- <h5><i class="icon fas fa-check"></i> Alert!</h5> --}}
                                {{ session('success') }}
                            </div>
                        @endif
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle"
                                        src="{{ asset('img/avatar-default.png') }}"
                                        alt="User profile picture">
                                </div>
                                <h3 class="profile-username text-center">{{ $user->name }}</h3>
                                <p class="text-muted text-center">Usuario: {{ $user->username }}</p>
                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>Email</b> <span class="float-right">{{ $user->email }}</span>
                                    </li>
                                </ul>
                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        @if ($user->roles->first())
                                            <b>Rol</b> <span class="float-right badge badge-pill badge-success permission-badge">{{ $user->roles->first()->name }}</span>
                                        @else
                                            <b>Rol</b> <span class="float-right badge badge-pill badge-danger permission-badge">No tiene rol asignado</span>
                                        @endif
                                    </li>
                                </ul>
                                <a href="{{ route('users.edit', $user) }}" class="btn btn-primary btn-block"><b>Editar</b></a>
                            </div>
                        </div>
                        {{-- <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">About Me</h3>
                            </div>
                            <div class="card-body">
                                <strong><i class="fas fa-book mr-1"></i> Education</strong>
                                <p class="text-muted">
                                    B.S. in Computer Science from the University of Tennessee at Knoxville
                                </p>
                                <hr>
                                <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>
                                <p class="text-muted">Malibu, California</p>
                                <hr>
                                <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>
                                <p class="text-muted">
                                    <span class="tag tag-danger">UI Design</span>
                                    <span class="tag tag-success">Coding</span>
                                    <span class="tag tag-info">Javascript</span>
                                    <span class="tag tag-warning">PHP</span>
                                    <span class="tag tag-primary">Node.js</span>
                                </p>
                                <hr>
                                <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>
                                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection