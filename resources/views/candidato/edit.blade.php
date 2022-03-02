@extends('layouts.apps')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Editar Candidato</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Inicio</a></li>
                            <li class="breadcrumb-item"><a href="{{route('candidato.index')}}">Candidato</a></li>
                            <li class="breadcrumb-item active">Editar Candidato</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row ">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Editar Candidato</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{route('candidato.update',$candidato->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="inputName">Nombre  </label>
                                    <input type="text" id="inputName" name="nombre" value="{{$candidato->nombre}}" class="form-control" required >
                                </div>
                                <div class="form-group">
                                    <label for="inputName">Distrito  </label>
                                    <select name="distrito_id" >
                                        <option value="{{$candidato->distrito->id}}"> {{$candidato->distrito->nombre}}</option>
                                        @foreach($distritos as $distrito)
                                            <option value="{{$distrito->id}}">{{$distrito->nombre}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="inputName">Partido  </label>
                                    <select name="partido_id" >
                                        <option value="{{$candidato->partido->id}}"> {{$candidato->partido->nombre}}</option>
                                        @foreach($partidos as $partido)
                                            <option value="{{$partido->id}}">{{$partido->nombre}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="inputName">Foto del Candidato  </label>
                                    <div>
                                        <img src="{{Storage::url($candidato->imagen)}}" alt="img" style="width: 100px">
                                    </div>
                                    <input type="file" id="inputName" name="imagen"  class="form-control" >
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-success float-right" >Guardar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>

            </div>

        </section>
        <!-- /.content -->
    </div>
@endsection
