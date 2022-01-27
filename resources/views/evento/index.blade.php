@extends('layouts.apps')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Eventos</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Inicio</a></li>
                            <li class="breadcrumb-item active">Eventos</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <div class="row p-3">
            <div class="col-12">
                <a class="btn btn-success float-right" href="{{route('evento.create')}}">Nuevo Evento</a>
            </div>
        </div>
        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Lista de Eventos</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fas fa-minus"></i></button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                            <i class="fas fa-times"></i></button>
                    </div>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped projects">
                        <thead>
                        <tr>
                            <th style="width: 1%">
                                #
                            </th>
                            <th style="width: 10%">
                                Título
                            </th>
                            <th style="width: 10%">
                                Slug
                            </th>
                            <th style="width: 10%">
                               Contenido
                            </th>
                            <th>
                                Fecha
                            </th>
                            <th>
                                Foto
                            </th>
                            <th style="width: 8%" class="text-center">
                                Votos
                            </th>
                            <th style="width: 20%">
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($eventos as $evento)
                            <tr>
                                <td>
                                    {{$evento->id}}
                                </td>
                                <td>
                                    {{$evento->titulo}}
                                </td>
                                <td>
                                    {{$evento->slug}}
                                </td>
                                <td class="project_progress">
                                    {{$evento->contenido}}
                                </td>
                                <td>
                                    {{$evento->fecha}}
                                </td>
                                <td>
                                    <img src="{{Storage::url($evento->imagen)}}" alt="" style="width: 50px">
                                </td>
                                <td class="project-state">
                                    <span class="badge badge-success">{{$evento->total_votos}}</span>
                                </td>
                                <td class="project-actions text-right">

                                    <a class="btn btn-info btn-sm" href="{{route('evento.edit',$evento->id)}}">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Editar
                                    </a>
                                    <a class="btn btn-danger btn-sm" href="{{route('evento.delete',$evento->id)}}" onclick="return confirm('¿Estás seguro de eliminar este evento?')">
                                        <i class="fas fa-trash">
                                        </i>
                                        Eliminar
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
@endsection
