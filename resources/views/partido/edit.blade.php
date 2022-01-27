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
                            <li class="breadcrumb-item"><a href="{{route('partido.index')}}">Partidos Políticos</a></li>
                            <li class="breadcrumb-item active">Editar Partido</li>
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
                            <h3 class="card-title">Editar Partido</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{route('partido.update',$partido->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="inputName">Nombre  </label>
                                    <input type="text" id="inputName" name="nombre" value="{{$partido->nombre}}" class="form-control" required >
                                </div>
                                <div class="form-group">
                                    <label for="inputName">siglas  </label>
                                    <input type="text" id="inputName" name="siglas" value="{{$partido->siglas}}" class="form-control" required >
                                </div>

                                <div class="form-group">
                                    <label for="inputName">Foto del Candidato  </label>
                                    <div>
                                        <img src="{{Storage::url($partido->imagen)}}" alt="img" style="width: 100px">
                                    </div>
                                    <input type="file" id="inputName" name="imagen"  class="form-control" >
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-success float-right" >Editar</button>
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
