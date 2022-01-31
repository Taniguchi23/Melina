@extends('layouts.apps')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Lista de Distritos</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Inicio</a></li>
                            <li class="breadcrumb-item active">Lista de Distritos</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <div class="row p-3">
            <div class="col-12">
                <a class="btn btn-success float-right" href="{{route('distrito.create')}}">Nuevo Distrito</a>
            </div>
        </div>
        <!-- Main content -->
        <section class="content">

            <div class="row">
                <div class="col-md-12">
                    <!-- /.card -->
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Distritos</h3>

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
                                    <th>Url Seo</th>
                                    <th>Foto</th>
                                    <th>Portada</th>
                                    <th class="text-center"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($distritos as $distrito)
                                    <tr>
                                        <td>{{$distrito->id}}</td>
                                        <td>{{$distrito->nombre}}</td>
                                        <td>{{$distrito->url_seo}}</td>
                                        <td><img src="{{Storage::url('distritos/'.$distrito->archivo)}}" alt="" style="width: 100px"></td>
                                        <td>{{$distrito->estado == 'A' ? 'Activo' : 'Desactivado' }}</td>
                                        <td class="text-right py-0 align-middle">
                                            <div class="btn-group btn-group-sm">
                                                <a href="{{route('distrito.edit',$distrito->id)}}" class="btn btn-info"><i class="fas fa-edit"></i></a>
                                                <a href="{{route('distrito.delete',$distrito->id)}}" class="btn btn-danger" onclick="return confirm('¿Está seguro de eliminar este registro?')"><i class="fas fa-trash" ></i></a>
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
