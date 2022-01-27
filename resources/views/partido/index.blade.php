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
                            <li class="breadcrumb-item active">Lista de Partidos Políticos</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <div class="row p-3">
            <div class="col-12">
                <a class="btn btn-success float-right" href="{{route('partido.create')}}">Nuevos Partidos</a>
            </div>
        </div>
        <!-- Main content -->
        <section class="content">

            <div class="row">
                <div class="col-md-12">
                    <!-- /.card -->
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Partidos</h3>

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
                                    <th>Siglas</th>
                                    <th>Foto</th>

                                    <th class="text-center"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($partidos as $partido)
                                    <tr>
                                        <td>{{$partido->id}}</td>
                                        <td>{{$partido->nombre}}</td>
                                        <td>{{$partido->siglas}}</td>
                                        <td><img style="width: 120px" src="{{Storage::url($partido->imagen)}}" alt=""></td>
                                        <td class="text-right py-0 align-middle">
                                            <div class="btn-group btn-group-sm">
                                                <a href="{{route('partido.edit',$partido->id)}}" class="btn btn-info"><i class="fas fa-edit"></i></a>
                                                <a href="{{route('partido.delete',$partido->id)}}" class="btn btn-danger" onclick="return confirm('¿Está seguro de eliminar este registro?')"><i class="fas fa-trash" ></i></a>
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
