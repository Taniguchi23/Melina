@extends('layouts.apps')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Lista de Candidatos</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Inicio</a></li>
                            <li class="breadcrumb-item active">Lista de Candidatos</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <div class="row p-3">
            <div class="col-12">
                <a class="btn btn-success float-right" href="{{route('candidato.create')}}">Nuevo Candidato</a>
            </div>
        </div>
        <!-- Main content -->
        <section class="content">

            <div class="row">
                <div class="col-md-12">
                    <!-- /.card -->
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Candidatos</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th style="width: 1%">
                                        #
                                    </th>
                                    <th>Nombres</th>
                                    <th>Distrito</th>
                                    <th>Partido Político</th>
                                    <th>Foto</th>

                                    <th class="text-center"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($candidatos as $candidato)
                                    <tr>
                                        <td>{{$candidato->id}}</td>
                                        <td>{{$candidato->nombre}}</td>
                                        <td>{{$candidato->distrito->nombre}}</td>
                                        <td>{{$candidato->partido->nombre}}</td>
                                        <td><img style="width: 120px" src="{{Storage::url($candidato->imagen)}}" alt=""></td>
                                        <td class="text-right py-0 align-middle">
                                            <div class="btn-group btn-group-sm">
                                                <a href="{{route('candidato.edit',$candidato->id)}}" class="btn btn-info"><i class="fas fa-edit"></i></a>
                                                <a href="{{route('candidato.delete',$candidato->id)}}" class="btn btn-danger" onclick="return confirm('¿Está seguro de eliminar este registro?')"><i class="fas fa-trash" ></i></a>
                                            </div>
                                        </td>
                                @endforeach
                                </tbody>
                            </table>
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
